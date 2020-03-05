<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class CustomLoginController extends Controller
{
    public function custom_login(Request $request){
    	$this->validate($request,[
    		'email' => 'required',
    		'password' => 'required|min:8'
    	]);

    	if(Auth::guard('web')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember))
    	{
            return redirect(route('user.dashboard'));

        }

        else if (Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember)) 
        {
        	return redirect(route('admin.dashbord'));
        	
        }
        else{
        	return back()->with('alert','adasdsa');
        }



    }


    public function custom_reg(Request $request){
        
        $user = new User;
        $user->name = $request->name;
        $user->photo=$request->photo;
        $user->email=$request->email;
        
        $user->password = bcrypt($request->password);
        $user->save();
        return Redirect('/login')->with('success','User registration Successfully');
           
        }
}
