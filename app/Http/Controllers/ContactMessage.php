<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage as ModelsContactMessage;
use Illuminate\Http\Request;

class ContactMessage extends Controller
{
    function contact_us_data(){
        $data=request()->validate([
            "username"=>"required",
            "email"=>"required",
            "message"=>"required"
        ]);
        if ($data) {
            $username=request('username');
            $email=request('email');
            $message=request('message');

            $messages=new ModelsContactMessage();
            $messages->username=$username;
            $messages->email=$email;
            $messages->message=$message;
            $messages->save();
            return back()->with("message","message sent to Admin");
        } else {
            return back()->withErrors($data);
        }        
    }
    
}
