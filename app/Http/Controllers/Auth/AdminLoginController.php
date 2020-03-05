<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin',['except'=>['logout']]);
    }


    public function showLoginform()
    {
        return view('auth.admin-login');
    }



    //this is login function for admin which is given email and password to get data form database
    public function login(Request $request)
    {
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required|min:8'
        ]);
        if(Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember)){
            return redirect(route('admin.dashbord'));
        }

        return redirect()->back();

    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect(route('admin.login'));
    }

}
