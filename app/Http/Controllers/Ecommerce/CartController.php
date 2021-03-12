<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Province;
use App\City;
use App\District;
use App\Customer;
use App\Order;
use App\OrderDetail;
use Illuminate\Support\Str;
use DB;
use App\Mail\CustomerRegisterMail;
use Mail;
use GuzzleHttp\Client;

class CartController extends Controller
{
    //
    public function addToCart(Request $request)
    {
        //VALIDASI DATA YANG DIKIRIM
        $this->validate($request, [
            'product_id' => 'required|exists:products,id', //PASTIKAN PRODUCT_IDNYA ADA DI DB
            'qty' => 'required|integer' //PASTIKAN QTY YANG DIKIRIM INTEGER
        ]);

        //AMBIL DATA CART DARI COOKIE, KARENA BENTUKNYA JSON MAKA KITA GUNAKAN JSON_DECODE UNTUK MENGUBAHNYA MENJADI ARRAY
        $carts = json_decode($request->cookie('dw-carts'), true); 
    
        //CEK JIKA CARTS TIDAK NULL DAN PRODUCT_ID ADA DIDALAM ARRAY CARTS
        if ($carts && array_key_exists($request->product_id, $carts)) {
            //MAKA UPDATE QTY-NYA BERDASARKAN PRODUCT_ID YANG DIJADIKAN KEY ARRAY
            $carts[$request->product_id]['qty'] += $request->qty;
        } else {
            //SELAIN ITU, BUAT QUERY UNTUK MENGAMBIL PRODUK BERDASARKAN PRODUCT_ID
            $product = Product::find($request->product_id);
            //TAMBAHKAN DATA BARU DENGAN MENJADIKAN PRODUCT_ID SEBAGAI KEY DARI ARRAY CARTS
            $carts[$request->product_id] = [
                'qty' => $request->qty,
                'product_id' => $product->id,
                'product_name' => $product->name,
                'product_price' => $product->price,
                'product_image' => $product->image,
                'weight' => $product->weight //TAMBAHKAN BERAT KE DALAM COOKIE
            ];
        }

        //BUAT COOKIE-NYA DENGAN NAME DW-CARTS
        //JANGAN LUPA UNTUK DI-ENCODE KEMBALI, DAN LIMITNYA 2800 MENIT ATAU 48 JAM
        $cookie = cookie('dw-carts', json_encode($carts), 2880);
        //STORE KE BROWSER UNTUK DISIMPAN
        //KITA JUGA MENAMBAHKAN FLASH MESSAGE UNTUK NOTIFIKASI PRODUK DIMASUKKAN KE KERANJANG
        return redirect()->back()->with(['success' => 'Produk Ditambahkan ke Keranjang'])->cookie($cookie);
    }

    public function listCart()
    {
        //MENGAMBIL DATA DARI COOKIE
        $carts = json_decode(request()->cookie('dw-carts'), true);
        //UBAH ARRAY MENJADI COLLECTION, KEMUDIAN GUNAKAN METHOD SUM UNTUK MENGHITUNG SUBTOTAL
        $subtotal = collect($carts)->sum(function($q) {
            return $q['qty'] * $q['product_price']; //SUBTOTAL TERDIRI DARI QTY * PRICE
        });
        //LOAD VIEW CART.BLADE.PHP DAN PASSING DATA CARTS DAN SUBTOTAL
        return view('ecommerce.cart', compact('carts', 'subtotal'));
    }

    public function updateCart(Request $request)
    {

        //AMBIL DATA DARI COOKIE
        //$carts = json_decode(request()->cookie('dw-carts'), true);
        $carts = $this->getCarts();

        //KEMUDIAN LOOPING DATA PRODUCT_ID, KARENA NAMENYA ARRAY PADA VIEW SEBELUMNYA
        //MAKA DATA YANG DITERIMA ADALAH ARRAY SEHINGGA BISA DI-LOOPING
        foreach ($request->product_id as $key => $row) {
            //DI CHECK, JIKA QTY DENGAN KEY YANG SAMA DENGAN PRODUCT_ID = 0
            if ($request->qty[$key] == 0) {
                //MAKA DATA TERSEBUT DIHAPUS DARI ARRAY
                unset($carts[$row]);
            } else {
                //SELAIN ITU MAKA AKAN DIPERBAHARUI
                $carts[$row]['qty'] = $request->qty[$key];
            }
        }
        //SET KEMBALI COOKIE-NYA SEPERTI SEBELUMNYA
        $cookie = cookie('dw-carts', json_encode($carts), 2880);
        //DAN STORE KE BROWSER.
        return redirect()->back()->cookie($cookie);
    }

    private function getCarts()
    {
        $carts = json_decode(request()->cookie('dw-carts'), true);
        $carts = $carts != '' ? $carts:[];
        return $carts;
    }

    public function checkout()
    {

        //william
        if (!auth()->guard('customer')->check()) {
            return redirect()->route('customer.login')->with(['error' => 'Silahkan Login Terlebih Dahulu']);
        }

        $provinces = Province::orderBy('created_at', 'DESC')->get();
        $carts = $this->getCarts();
        $subtotal = collect($carts)->sum(function($q) {
            return $q['qty'] * $q['product_price'];
        });
        //TAMBAHKAN FUNGSI UNTUK MENGHITUNG BERAT BARANG
        $weight = collect($carts)->sum(function($q) {
            return $q['qty'] * $q['weight'];
        });
        //JANGAN LUPA PASSING KE VIEW
        return view('ecommerce.checkout', compact('provinces', 'carts', 'subtotal', 'weight'));
    }

    public function getCity()
    {
        //QUERY UNTUK MENGAMBIL DATA KOTA / KABUPATEN BERDASARKAN PROVINCE_ID
        $cities = City::where('province_id', request()->province_id)->get();
        //KEMBALIKAN DATANYA DALAM BENTUK JSON
        return response()->json(['status' => 'success', 'data' => $cities]);
    }

    public function getDistrict()
    {
        //QUERY UNTUK MENGAMBIL DATA KECAMATAN BERDASARKAN CITY_ID
        $districts = District::where('city_id', request()->city_id)->get();
        //KEMUDIAN KEMBALIKAN DATANYA DALAM BENTUK JSON
        return response()->json(['status' => 'success', 'data' => $districts]);
    }

    public function processCheckout(Request $request)
    {
        //VALIDASI DATANYA
        $this->validate($request, [
            'customer_name' => 'required|string|max:100',
            'customer_phone' => 'required',
            'email' => 'required|email',
            'customer_address' => 'required|string',
            'province_id' => 'required|exists:provinces,id',
            'city_id' => 'required|exists:cities,id',
            'district_id' => 'required|exists:districts,id',
            'courier' => 'required' //TAMBAHKAN VALIDASI KURIR
        ]);

        //INISIASI DATABASE TRANSACTION
        //DATABASE TRANSACTION BERFUNGSI UNTUK MEMASTIKAN SEMUA PROSES SUKSES UNTUK KEMUDIAN DI COMMIT AGAR DATA BENAR BENAR DISIMPAN, JIKA TERJADI ERROR MAKA KITA ROLLBACK AGAR DATANYA SELARAS
        DB::beginTransaction();
        try {
            //CHECK DATA CUSTOMER BERDASARKAN EMAIL
            $customer = Customer::where('email', $request->email)->first();
            
            if ($customer) {

                //william
                //Remove code below karena untuk ke page http://localhost/dw-ecommerce/public/checkout harus login dulu sbelumnya
                //sehingga di logic sudah pasti sudah login

                //JIKA DIA TIDAK LOGIN DAN DATA CUSTOMERNYA ADA
                // if (!auth()->guard('customer')->check() && $customer) {
                //     return redirect()->back()->with(['error' => 'Silahkan Login Terlebih Dahulu']);
                // }

                //AMBIL DATA KERANJANG
                $carts = $this->getCarts();
                //HITUNG SUBTOTAL BELANJAAN
                $subtotal = collect($carts)->sum(function($q) {
                    return $q['qty'] * $q['product_price'];
                });

                //UNTUK MENGHINDARI DUPLICATE CUSTOMER, MASUKKAN QUERY UNTUK MENAMBAHKAN CUSTOMER BARU
                //SEBENARNYA VALIDASINYA BISA DIMASUKKAN PADA METHOD VALIDATION DIATAS, TAPI TIDAK MENGAPA UNTUK MENCOBA CARA BERBEDA

                //william
                //Code ini dicomment karena logic add customer akan dihandle saat user signup
                /*
                if (!auth()->guard('customer')->check()) {
                    $password = Str::random(8);
                    $customer = Customer::create([
                        'name' => $request->customer_name,
                        'email' => $request->email,
                        'password' => $password,
                        'phone_number' => $request->customer_phone,
                        'address' => $request->customer_address,
                        'district_id' => $request->district_id,
                        'activate_token' => Str::random(30),
                        'status' => false
                    ]);
                }
                */

                $shipping = explode('-', $request->courier); //EXPLODE DATA KURIR, KARENA FORMATNYA, NAMAKURIR-SERVICE-COST
                $explodeShippingCount = count($shipping);

                $shippingName='';
                for ($counter = 0; $counter < $explodeShippingCount - 1; $counter++)
                {
                    $shippingName .= $shipping[$counter] . '-';
                }
                $shippingName = rtrim($shippingName,'-');

                $order = Order::create([
                    'invoice' => Str::random(4) . '-' . time(),
                    'customer_id' => $customer->id,
                    'customer_name' => $customer->name,
                    'customer_phone' => $request->customer_phone,
                    'customer_address' => $request->customer_address,
                    'district_id' => $request->district_id,
                    'subtotal' => $subtotal,

                    //'cost' => $shipping[2], //SIMPAN INFORMASI BIAYA ONGKIRNYA PADA INDEX 2
                    'cost' => $shipping[$explodeShippingCount - 1], //SIMPAN INFORMASI BIAYA ONGKIRNYA PADA INDEX 2

                    // 'shipping' => $shipping[0] . '-' . $shipping[1], //SIMPAN NAMA KURIR DAN SERVICE YANG DIGUNAKAN
                    'shipping' => $shippingName, //SIMPAN NAMA KURIR DAN SERVICE YANG DIGUNAKAN

                    // 'ref' => $affiliate != '' && $explodeAffiliate[0] != auth()->guard('customer')->user()->id ? $affiliate:NULL
                ]);

                //LOOPING DATA DI CARTS
                foreach ($carts as $row) {
                    //AMBIL DATA PRODUK BERDASARKAN PRODUCT_ID
                    $product = Product::find($row['product_id']);
                    //SIMPAN DETAIL ORDER
                    OrderDetail::create([
                        'order_id' => $order->id,
                        'product_id' => $row['product_id'],
                        'price' => $row['product_price'],
                        'qty' => $row['qty'],
                        'weight' => $product->weight
                    ]);
                }
                
                //TIDAK TERJADI ERROR, MAKA COMMIT DATANYA UNTUK MENINFORMASIKAN BAHWA DATA SUDAH FIX UNTUK DISIMPAN
                DB::commit();

                $carts = [];
                //KOSONGKAN DATA KERANJANG DI COOKIE
                $cookie = cookie('dw-carts', json_encode($carts), 2880);

                //EMAILNYA JUGA UNTUK CUSTOMER BARU
                //william
                //Logic ini dipindahkan ke signup page
                // if (!auth()->guard('customer')->check()) {
                //     Mail::to($request->email)->send(new CustomerRegisterMail($customer, $password));
                // }
                
                //REDIRECT KE HALAMAN FINISH TRANSAKSI
                return redirect(route('front.finish_checkout', $order->invoice))->cookie($cookie);

            }
            //JIKA USER TIDAK ADA, MAKA REDIRECT KE HALAMAN LOGIN
            //DENGAN MENGIRIMKAN FLASH SESSION ERROR
            return redirect(route('customer.login'))->with(['error' => 'Silahkan Login Terlebih Dahulu']);

        } catch (\Exception $e) {
            //JIKA TERJADI ERROR, MAKA ROLLBACK DATANYA
            DB::rollback();
            //DAN KEMBALI KE FORM TRANSAKSI SERTA MENAMPILKAN ERROR
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function checkoutFinish($invoice)
    {
        //AMBIL DATA PESANAN BERDASARKAN INVOICE
        $order = Order::with(['district.city'])->where('invoice', $invoice)->first();
        //LOAD VIEW checkout_finish.blade.php DAN PASSING DATA ORDER
        return view('ecommerce.checkout_finish', compact('order'));
    }

    public function getCourier(Request $request)
    {
        $this->validate($request, [
            'destination' => 'required',
            'weight' => 'required|integer'
        ]);

        //MENGIRIM PERMINTAAN KE API RUANGAPI UNTUK MENGAMBIL DATA ONGKOS KIRIM
        //BACA DOKUMENTASI UNTUK PENJELASAN LEBIH LANJUT
        $url = 'https://ruangapi.com/api/v1/shipping';
        $client = new Client();
        $response = $client->request('POST', $url, [
            'headers' => [
                'Authorization' => 'MmavAywaUpEM3P3C5HRig6whdYT7K2z9HUfKoHqZ'
            ],
            'form_params' => [
                'origin' => 22, //ASAL PENGIRIMAN, 22 = BANDUNG
                'destination' => $request->destination,
                'weight' => $request->weight,
                'courier' => 'jnt,tiki' //MASUKKAN KEY KURIR LAINNYA JIKA INGIN MENDAPATKAN DATA ONGKIR DARI KURIR YANG LAIN
            ]
        ]);

        $body = json_decode($response->getBody(), true);
        return $body;
    }

}
