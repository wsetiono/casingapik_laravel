<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use Validator;

class LoginController extends Controller
{
    //
    public function loginForm()
    {
        //william
        // if (auth()->guard('customer')->check()) return redirect(route('customer.dashboard'));

        //Get URLs of previous page
        $urlPrevious = url()->previous();
        $urlBase = url()->to('/');

        // Set the previous url that we came from to redirect to after successful login but only if is internal
        if(($urlPrevious != $urlBase . '/member/login') && (substr($urlPrevious, 0, strlen($urlBase)) === $urlBase)) {
            session()->put('url.intended', $urlPrevious);
        }

        return view('ecommerce.login');
    }

    public function login(Request $request)
    {
        //VALIDASI DATA YANG DITERIMA

        //william
        // $this->validate($request, [
        //     'email' => 'required|email|exists:customers,email',
        //     'password' => 'required|string'
        // ]);

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:customers,email',
            'password' => 'required|string'
        ]);

        if (!$validator->fails()) {

            //CUKUP MENGAMBIL EMAIL DAN PASSWORD SAJA DARI REQUEST
            //KARENA JUGA DISERTAKAN TOKEN
            $auth = $request->only('email', 'password');
            $auth['status'] = 1; //TAMBAHKAN JUGA STATUS YANG BISA LOGIN HARUS 1
        
            //CHECK UNTUK PROSES OTENTIKASI
            //DARI GUARD CUSTOMER, KITA ATTEMPT PROSESNYA DARI DATA $AUTH
            if (auth()->guard('customer')->attempt($auth)) {
                
                //william
                // return redirect()->intended(route('customer.dashboard'));
                return redirect()->intended('/');

            } 
            else
            {
                return redirect()->back()->withErrors(['error' => 'Email / Password Salah']);

            }

        }

        return redirect()->back()->withErrors($validator)->withInput();

    }

    public function dashboard()
    {
        $orders = Order::selectRaw('COALESCE(sum(CASE WHEN status = 0 THEN subtotal END), 0) as pending, 
        COALESCE(count(CASE WHEN status = 3 THEN subtotal END), 0) as shipping,
        COALESCE(count(CASE WHEN status = 4 THEN subtotal END), 0) as completeOrder')
        ->where('customer_id', auth()->guard('customer')->user()->id)->get();

        return view('ecommerce.dashboard', compact('orders'));
    }

    public function logout()
    {
        auth()->guard('customer')->logout(); //JADI KITA LOGOUT SESSION DARI GUARD CUSTOMER
        return redirect(route('customer.login'));
    }
}
