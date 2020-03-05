<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Admin;

class AdminController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
            }



     public function index()
     {  
        $admin = Admin::first();
        return view('admin.index', compact('admin'));
     } 

//Change Password........................................................................

      public function change_password()
    {   
        return view('admin.changePassword');
    }

    public function change_password_save(Request $request)
    {   
       $validatedData = $request->validate([
        'n_pass' => 'required|min:8',
        'c_pass' => 'required|min:8',

    ]);

        $npass = $request->n_pass;
        $cpass = $request->c_pass;
        if ($npass != $cpass)
        {
            return back()->with('alert','Password Not Match');
        }else{
            $admin = Admin::where('id',Auth::user()->id)->first();
            $admin->password = Hash::make($npass);
            $admin->save();
            return back()->with('success','Password Changed');
        }
    } 



//end Change Password........................................................................



     public function ShowProfile()
     {   
        $admin = Admin::first();
        return view('admin.profile', compact('admin'));
     }    


     public function admin_profile_update(Request $request)
     {
        $obj = Admin::first();

        $obj->name=$request->name;
        
        $obj->email=$request->email;
        
        // logo
        if ($request->hasFile('photo')) {
            $files=$request->file('photo');  
            $filename=$files->getClientOriginalName();
            $picture=date('His').$filename;
            $destination_path=base_path().'/public/backend/photo/';
            $files->move($destination_path, $picture); 
            $obj->photo=$picture;
        }
       
       
        $obj->save();
        return redirect()->back()->with('success', ' General setting has been added successfully');
    }
      
}
