<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GeneralSetting;
use App\Admin;
use DB;
use Session;
session_start();

class GeneralSettingController extends Controller
{
    public function g_settings()
    {   
    	
        $gnrlstng = GeneralSetting::first();
        return view('admin.g_settings',compact('gnrlstng'));
    	
    }


    public function store_g_settings(Request $request)
    {



    	$obj = GeneralSetting::first();

        $obj->name=$request->name;
        $obj->logo_name=$request->logo_name;
        $obj->color=$request->color;
        $obj->navbar_color=$request->navbar_color;
        $obj->address=$request->address;
        $obj->mobile=$request->mobile;
        $obj->email=$request->email;
        $obj->currency=$request->currency;
        $obj->top_text=$request->top_text;
        $obj->facebook=$request->facebook;
        $obj->tweeter=$request->tweeter;
        $obj->google_plus=$request->google_plus;
        $obj->linkin=$request->linkin;
        $obj->youtube=$request->youtube;
        $obj->footer_text=$request->footer_text;
        $obj->fotr_btm_txt=$request->fotr_btm_txt;
        // logo
        if ($request->hasFile('logo')) {
            $files=$request->file('logo');  
            $filename=$files->getClientOriginalName();
            $picture=date('His').$filename;
            $destination_path=base_path().'/public/backend/logo/';
            $files->move($destination_path, $picture); 
            $obj->logo=$picture;
        }
       
        // favicon
        if ($request->hasFile('favicon')) {
            $files=$request->file('favicon');  
            $filename=$files->getClientOriginalName();
            $picture=date('His').$filename;
            $destination_path=base_path().'/public/backend/favicon/';
            $files->move($destination_path, $picture); 
            $obj->favicon=$picture;    
        }
        $obj->save();
        return redirect()->back()->with('success', ' General setting has been added successfully');
    }



    //////Email Settings............................

    public function email_settings()
    {   
    	
        
        return view('admin.email_setting');
    	
    }

}
