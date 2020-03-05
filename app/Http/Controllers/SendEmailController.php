<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class SendEmailController extends Controller
{
   

    public function email_settings()
    {   
    	
        
        return view('admin.email_setting');
    	
    }


    function send_email(Request $get)
    {
     $this->validate($get, [
      
      'email'  =>  'required|email',
      'message' =>  'required'
     ]);

     
     $email = $get->email;
     $message = $get->message;

     Mail::to($email)->send(new SendMail($message));
     return back()->with('success', 'Thanks for contacting us!');

    }
}
