<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package;

class ManagementController extends Controller
{
    public function add_package()
    {
    	return view('admin.package.add_package');
    }

    public function store_package(Request $request)
    {
      
        $obj = new Package;

        $obj->pkg_name=$request->pkg_name;
        $obj->per_price=$request->per_price;
        $obj->day=$request->day;
        $obj->min_num=$request->min_num;
        $obj->max_num=$request->max_num;
        $obj->booking_date=$request->booking_date;
        $obj->till_date=$request->till_date;
        $obj->leaving_form=$request->leaving_form;
        $obj->leaving_to=$request->leaving_to;
        $obj->overview=$request->overview;
        $obj->schedule=$request->schedule;
        
        // preview img
        if ($request->hasFile('img')) {
            $files=$request->file('img');  
            $filename=$files->getClientOriginalName();
            $picture=date('His').$filename;
            $destination_path=base_path().'/public/backend/package/img/';
            $files->move($destination_path, $picture); 
            $obj->img=$picture;
        }
       
       
        $obj->save();
        return redirect()->back()->with('success', ' Package has been added successfully');
    }


    public function all_package()
    {   
    	$packages = Package::all();
    	return view('admin.package.all_package', compact('packages'));
    }

    public function package_delete(Request $request)
    {
        $data = Package::where('id',$request->deleteuser)->first();
        $data->delete();
        return back()->with('success','package Deleted');
    }
}
