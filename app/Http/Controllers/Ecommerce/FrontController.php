<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Customer;
use App\Province;
use App\ProductAttributeValue;
use App\AttributeOption;
use DB;

class FrontController extends Controller
{
    //
    public function index()
    {
        //MEMBUAT QUERY UNTUK MENGAMBIL DATA PRODUK YANG DIURUTKAN BERDASARKAN TGL TERBARU
        //DAN DI-LOAD 10 DATA PER PAGENYA
        // $products = Product::orderBy('created_at', 'DESC')->paginate(10);
        $products = Product::with(['category'])->orderBy('created_at', 'DESC')->paginate(10);

        //LOAD VIEW INDEX.BLADE.PHP DAN PASSING DATA DARI VARIABLE PRODUCTS
        return view('ecommerce.index', compact('products'));
    }

    public function product()
    {
        /*
        //BUAT QUERY UNTUK MENGAMBIL DATA PRODUK, LOAD PER PAGENYA KITA GUNAKAN 12 AGAR PRESISI PADA HALAMAN TERSEBUT KARENA DALAM SEBARIS MEMUAT 4 BUAH PRODUK
        $products = Product::orderBy('created_at', 'DESC')->paginate(12);
        //LOAD JUGA DATA KATEGORI YANG AKAN DITAMPILKAN PADA SIDEBAR
        $categories = Category::with(['child'])->withCount(['child'])->getParent()->orderBy('name', 'ASC')->get();
        //LOAD VIEW PRODUCT.BLADE.PHP DAN PASSING KEDUA DATA DIATAS
        return view('ecommerce.product', compact('products', 'categories'));
        */

        $products = Product::orderBy('created_at', 'DESC')->paginate(12);

        return view('ecommerce.product', compact('products'));
    }

    public function categoryProduct($slug)
    {
       //JADI QUERYNYA ADALAH KITA CARI DULU KATEGORI BERDASARKAN SLUG, SETELAH DATANYA DITEMUKAN
       //MAKA SLUG AKAN MENGAMBIL DATA PRODUCT YANG BERELASI MENGGUNAKAN METHOD PRODUCT() YANG TELAH DIDEFINISIKAN PADA FILE CATEGORY.PHP SERTA DIURUTKAN BERDASARKAN CREATED_AT DAN DI-LOAD 12 DATA PER SEKALI LOAD
        $products = Category::where('slug', $slug)->first()->product()->orderBy('created_at', 'DESC')->paginate(12);
        //LOAD VIEW YANG SAMA YAKNI PRODUCT.BLADE.PHP KARENA TAMPILANNYA AKAN KITA BUAT SAMA JUGA
        return view('ecommerce.product', compact('products'));
    }

    public function search(Request $request)
    {
        // menangkap data pencarian
        $keyword = $request->keyword;
        
        $products = Product::select('products.name','products.image','products.price','products.slug')
        ->where('products.name','like',"%".$keyword."%")
        ->orWhere('products.description','like',"%".$keyword."%")
        ->orWhere('categories.name','like',"%".$keyword."%")
        ->orWhere('attribute_options.name','like',"%".$keyword."%")
        ->join('categories', 'categories.id', '=', 'products.category_id')
        ->leftJoin('product_attribute_values', 'product_attribute_values.product_id', '=', 'products.id')
        ->leftJoin('attribute_options', 'attribute_options.id', '=', 'product_attribute_values.attribute_options_id')
        ->groupBy('products.name','products.image','products.price','products.slug')
        ->orderBy('products.created_at', 'DESC');

        $products_count = $products->get()->count();

        $products = $products->paginate(8);

        return view('ecommerce.search', compact('products', 'products_count', 'keyword'));

    }

    public function collection(Request $request)
    {

        $sortBy = $request->sortBy;
        $category_slug = $request->category;
        $attribute_options_slug = $request->attribute_options;

        $attribute_options_name = null;

        if($attribute_options_slug != null)
        {
            if($sortBy == "newest")
            {
                $products = Product::select('products.name','products.image','products.price','products.slug')
                                        ->where('categories.slug',$category_slug)
                                        ->where('attribute_options.slug',$attribute_options_slug)
                                        ->join('product_attribute_values', 'products.id', '=', 'product_attribute_values.product_id')
                                        ->join('categories', 'categories.id', '=', 'products.category_id')
                                        ->join('attribute_options', 'attribute_options.id', '=', 'product_attribute_values.attribute_options_id')
                                        ->orderBy('products.created_at', 'DESC');
            }
            else if ($sortBy == "price-ascending")
            {
                $products = Product::select('products.name','products.image','products.price','products.slug')
                                        ->where('categories.slug',$category_slug)
                                        ->where('attribute_options.slug',$attribute_options_slug)
                                        ->join('product_attribute_values', 'products.id', '=', 'product_attribute_values.product_id')
                                        ->join('categories', 'categories.id', '=', 'products.category_id')
                                        ->join('attribute_options', 'attribute_options.id', '=', 'product_attribute_values.attribute_options_id')
                                        ->orderBy('products.price', 'ASC');
            }
            else if ($sortBy == "price-descending")
            {
                $products = Product::select('products.name','products.image','products.price','products.slug')
                                        ->where('categories.slug',$category_slug)
                                        ->where('attribute_options.slug',$attribute_options_slug)
                                        ->join('product_attribute_values', 'products.id', '=', 'product_attribute_values.product_id')
                                        ->join('categories', 'categories.id', '=', 'products.category_id')
                                        ->join('attribute_options', 'attribute_options.id', '=', 'product_attribute_values.attribute_options_id')
                                        ->orderBy('products.price', 'DESC');
            }


            $attribute_options_name = AttributeOption::select('name')
                            ->where('attribute_options.slug',$attribute_options_slug)
                            ->first()
                            ->name;

        }
        else 
        {

            if($sortBy == "newest")
            {
                $products = Product::select('products.name','products.image','products.price','products.slug')
                                        ->where('categories.slug',$category_slug)
                                        ->join('categories', 'categories.id', '=', 'products.category_id')
                                        ->orderBy('products.created_at', 'DESC');
            }
            else if ($sortBy == "price-ascending")
            {
                $products = Product::select('products.name','products.image','products.price','products.slug')
                                        ->where('categories.slug',$category_slug)
                                        ->join('categories', 'categories.id', '=', 'products.category_id')
                                        ->orderBy('products.price', 'ASC');
            }
            else if ($sortBy == "price-descending")
            {
                $products = Product::select('products.name','products.image','products.price','products.slug')
                                        ->where('categories.slug',$category_slug)
                                        ->join('categories', 'categories.id', '=', 'products.category_id')
                                        ->orderBy('products.price', 'DESC');
            }

        }

        // $products_count = $products->count();
        $products_count = $products->get()->count();

        $products = $products->paginate(8);

        $category_name = Category::select('name')
                        ->where('categories.slug',$category_slug)
                        ->first()
                        ->name;

        if($request->ajax())
        {

            return response()->json(['status' => 'success', 'data' => $products]);

        }

        return view('ecommerce.product', compact('products', 'category_name', 'attribute_options_name', 'category_slug', 'attribute_options_slug', 'sortBy', 'products_count'));

    }

    public function show($slug)
    {
        //QUERY UNTUK MENGAMBIL SINGLE DATA BERDASARKAN SLUG-NYA
        $product = Product::with(['category'])->where('slug', $slug)->first();

        $relatedProduct = Product::select('products.name','products.image','products.price','products.slug')
        ->where('categories.name',$product->category->name)
        ->join('categories', 'categories.id', '=', 'products.category_id')
        ->orderBy('products.created_at', 'DESC')
        ->get();

        //william
        $matchThese = ['product_id' => $product->id];
        $attribute_ids = ProductAttributeValue::select('attributes.id')
                                        ->where($matchThese)
                                        ->join('attributes', 'attributes.id', '=', 'product_attribute_values.attribute_id')
                                        ->distinct()
                                        ->get(); 

        $attribute = null;

        foreach($attribute_ids as $attribute_id)
        {
            //loop through each attribute of the product_id
            $attributeName = ProductAttributeValue::select('attributes.name')
                                            ->where('product_id',$product->id)
                                            ->where('product_attribute_values.attribute_id',$attribute_id->id)
                                            ->join('attributes', 'attributes.id', '=', 'product_attribute_values.attribute_id')
                                            ->join('attribute_options', 'attribute_options.id', '=', 'product_attribute_values.attribute_options_id')
                                            ->first();

            $attributeOptionName = ProductAttributeValue::select('attribute_options.name')
                                            ->where('product_id',$product->id)
                                            ->where('product_attribute_values.attribute_id',$attribute_id->id)
                                            ->join('attributes', 'attributes.id', '=', 'product_attribute_values.attribute_id')
                                            ->join('attribute_options', 'attribute_options.id', '=', 'product_attribute_values.attribute_options_id')
                                            ->get();

            $attribute[$attributeName->name] = $attributeOptionName;

        }

        $image = $product->image;
        $image2 = $product->image2;
        $image3 = $product->image3;
        $image4 = $product->image4;
        $image5 = $product->image5;

        $imageCount = 0;
        if ($image != null)
            $imageCount++;
        if ($image2 != null)
            $imageCount++;        
        if ($image3 != null)
            $imageCount++;
        if ($image4 != null)
            $imageCount++;
        if ($image5 != null)
            $imageCount++;

        //william

        //LOAD VIEW SHOW.BLADE.PHP DAN PASSING DATA PRODUCT
        return view('ecommerce.show', compact('product', 'attribute', 'imageCount', 'relatedProduct'));
    }

    public function verifyCustomerRegistration($token)
    {
        //JADI KITA BUAT QUERY UNTUK MENGMABIL DATA USER BERDASARKAN TOKEN YANG DITERIMA
        $customer = Customer::where('activate_token', $token)->first();
        if ($customer) {
            //JIKA ADA MAKA DATANYA DIUPDATE DENGNA MENGOSONGKAN TOKENNYA DAN STATUSNYA JADI AKTIF
            $customer->update([
                'activate_token' => null,
                'status' => 1
            ]);
            //REDIRECT KE HALAMAN LOGIN DENGAN MENGIRIMKAN FLASH SESSION SUCCESS
            return redirect(route('customer.login'))->with(['success' => 'Verifikasi Berhasil, Silahkan Login']);
        }
        //JIKA TIDAK ADA, MAKA REDIRECT KE HALAMAN LOGIN
        //DENGAN MENGIRIMKAN FLASH SESSION ERROR
        return redirect(route('customer.login'))->with(['error' => 'Invalid Verifikasi Token']);
    }

    public function customerSettingForm()
    {
        //MENGAMBIL DATA CUSTOMER YANG SEDANG LOGIN
        $customer = auth()->guard('customer')->user()->load('district');
        //GET DATA PROPINSI UNTUK DITAMPILKAN PADA SELECT BOX
        $provinces = Province::orderBy('name', 'ASC')->get();
        //LOAD VIEW setting.blade.php DAN PASSING DATA CUSTOMER - PROVINCES
        return view('ecommerce.setting', compact('customer', 'provinces'));
    }

    public function customerUpdateProfile(Request $request)
    {
        //VALIDASI DATA YANG DIKIRIM
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'phone_number' => 'required|max:15',
            'address' => 'required|string',
            'district_id' => 'required|exists:districts,id',
            'password' => 'nullable|string|min:6'
        ]);

        //AMBIL DATA CUSTOMER YANG SEDANG LOGIN
        $user = auth()->guard('customer')->user();
        //AMBIL DATA YANG DIKIRIM DARI FORM
        //TAPI HANYA 4 COLUMN SAJA SESUAI YANG ADA DI BAWAH
        $data = $request->only('name', 'phone_number', 'address', 'district_id');
        //ADAPUN PASSWORD KITA CEK DULU, JIKA TIDAK KOSONG
        if ($request->password != '') {
            //MAKA TAMBAHKAN KE DALAM ARRAY
            $data['password'] = $request->password;
        }
        //TERUS UPDATE DATANYA
        $user->update($data);
        //DAN REDIRECT KEMBALI DENGAN MENGIRIMKAN PESAN BERHASIL
        return redirect()->back()->with(['success' => 'Profil berhasil diperbaharui']);
    }

}
