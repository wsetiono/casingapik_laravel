<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use Validator;
use App\Mail\ForgotPasswordMail;
use App\Customer;
use DB;
use Carbon\Carbon;
use Mail;
use Illuminate\Support\Facades\URL;


class ForgotPasswordController extends Controller
{
    //
    public function forgotPasswordForm()
    {
        return view('ecommerce.forgotpassword');
    }

    public function forgotPassword(Request $request)
    {
        //VALIDASI DATA YANG DITERIMA

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:customers,email',
        ]);

        if (!$validator->fails()) {

            //CUKUP MENGAMBIL EMAIL DAN PASSWORD SAJA DARI REQUEST
            //KARENA JUGA DISERTAKAN TOKEN
            $auth = $request->only('email');
            $auth['status'] = 1; //TAMBAHKAN JUGA STATUS YANG BISA LOGIN HARUS 1
        
            $customer = Customer::where('email', $request->email)->first();
            
            if ($customer) {
                
                //Lakukan kirim email berupa link reset email
                //Create Password Reset Token
                DB::table('password_resets')->insert([
                    'email' => $request->email,
                    'token' => str_random(60),
                    'created_at' => Carbon::now()
                ]);
                //Get the token just created above
                $tokenData = DB::table('password_resets')
                    ->where('email', $request->email)->first();

                if ($this->sendResetEmail($request->email, $tokenData->token)) {
                    return redirect()->back()->with('status', trans('A reset link has been sent to your email address.'));
                } else {
                    return redirect()->back()->withErrors(['error' => trans('A Network Error occurred. Please try again.')]);
                }

            } 
            else
            {
                return redirect()->back()->withErrors(['error' => 'Email Tidak Terdaftar']);

            }

        }

        return redirect()->back()->withErrors($validator)->withInput();

    }

    private function sendResetEmail($email, $token)
    {
        //Retrieve the user from the database
        $customer = Customer::where('email', $email)->first();
        //Generate, the password reset link. The token generated is embedded in the link
        //$link = config('base_url') . 'password/reset/' . $token . '?email=' . urlencode($email);
        $link = env('APP_URL') . 'password/reset/' . $token . '?email=' . urlencode($email);

        try {
            //Here send the link with CURL with an external email API 
            Mail::to($email)->send(new ForgotPasswordMail($customer, $link));

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    /*
    public function resetPassword(Request $request)
    {
        //Validate input
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|confirmed'
            'token' => 'required' ]);

        //check if payload is valid before moving on
        if ($validator->fails()) {
            return redirect()->back()->withErrors(['email' => 'Please complete the form']);
        }

        $password = $request->password;
    // Validate the token
        $tokenData = DB::table('password_resets')
        ->where('token', $request->token)->first();
    // Redirect the user back to the password reset request form if the token is invalid
        if (!$tokenData) return view('auth.passwords.email');

        $user = User::where('email', $tokenData->email)->first();
    // Redirect the user back if the email is invalid
        if (!$user) return redirect()->back()->withErrors(['email' => 'Email not found']);
    //Hash and update the new password
        $user->password = \Hash::make($password);
        $user->update(); //or $user->save();

        //login the user immediately they change password successfully
        Auth::login($user);

        //Delete the token
        DB::table('password_resets')->where('email', $user->email)
        ->delete();

        //Send Email Reset Success Email
        if ($this->sendSuccessEmail($tokenData->email)) {
            return view('index');
        } else {
            return redirect()->back()->withErrors(['email' => trans('A Network Error occurred. Please try again.')]);
        }

    }
    */

}