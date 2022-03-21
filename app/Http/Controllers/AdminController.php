<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function admin()
    {
        return view('admin.admin');
    }
    function manage_premium_user()
    {
        $users = User::all();
        return view('admin.manage-premium-user',['users'=>$users]);
    }
    function delete_user($id){
        $users=User::find($id);
        $users->delete();
        return back()->with('message',"selected user is deleted !");
    }
    function edit_user($id){
        $users=User::find($id);
        return view('admin.editUser',['users'=>$users]);
    }
    function update_user($id){
        $data=request()->validate([
            "username"=>"required",
            "email"=>"required",
            "isAdmin"=>"required",
            "isPremium"=>"required",
        ]);
        if ($data) {
            $updateUser=User::find($id);

            $updateUser->name=request('username');
            $updateUser->email=request('email');
            $updateUser->isAdmin=request('isAdmin');
            $updateUser->isPremium=request('isPremium');

            $updateUser->update();
            return back()->with('message',"updated");
        } else {
            return back()->withErrors($data);
        }
        
    }
    function manage_contact_us()
    {
        $message = ContactMessage::all();
        return view('admin.manage-contact-us', ['messages' => $message]);
    }
    function delete_message($id)
    {
        $deleteMessage = ContactMessage::find($id);
        $deleteMessage->delete();
        return back()->with('message', 'message is deleted');
    }
    function update_message($id)
    {
        $updateMessage = ContactMessage::find($id);
        return view('admin.updateMessage', ['updateData' => $updateMessage]);
    }
    function update_message_data($id)
    {
        $updateMessage = ContactMessage::find($id);

        $updateMessage->username = request('username');
        $updateMessage->email = request('email');
        $updateMessage->message = request('message');

        $updateMessage->update();
        return back()->with('message', 'message is updated');
    }
}
