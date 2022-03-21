<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function login()
    {
        return view('auth.login');
    }
    function register()
    {
        return view('auth.register');
    }
    function post_register()
    {
        $data = request()->validate([
            'username' => "",
            'email' => "",
            'password' => "min:8||confirmed",
            'image' => ""
        ]);
        if ($data) {
            $image = request('image');
            $image_name = uniqid() . "_" . $image->getClientOriginalName();
            $image->move(public_path('img/profiles'), $image_name);

            $user = new User();
            $user->name = $data['username'];
            $user->email = $data['email'];
            $user->password = Hash::make($data['password']);
            $user->image = $image_name;
            $user->phone = '';
            $user->address = '';
            $user->bio = '';
            $user->save();

            if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
                return redirect()->route('index');
            }
        } else {
            return back()->withErrors($data);
        }
    }
    function post_login()
    {
        $validation = request()->validate([
            "email" => "required",
            "password" => "required",
        ]);

        if ($validation) {
            $auth = Auth::attempt(['email' => request('email'), 'password' => request('password')]);

            if ($auth) {
                return redirect()->route('index');
            } else {
                return back()->with("error", "Authentication Failed Try Again");
            }
        } else {
            return back()->withErrors($validation);
        }
    }
    function edit_user_profile()
    {
        return view('users.edit-profile');
    }
    function post_edit_user_profile()
    {
        $name = request('name');
        $email = request('email');
        $bio = request('bio');
        $phone = request('phone');
        $address = request('address');
        $image = request('image');
        $old_password = request('old_password');
        $new_password = request('new_password');

        $id = auth()->user()->id;
        $current_user = User::find($id);
        $current_user->name = $name;
        $current_user->email = $email;
        $current_user->bio = $bio;
        $current_user->phone = $phone;
        $current_user->address = $address;

        if ($image) {
            $current_user->image = $image;
            $image_name = uniqid() . "_" . $image->getClientOriginalName();
            $image->move(public_path('img/profiles'), $image_name);
            $current_user->image = $image_name;
            $current_user->update();
            return redirect()->route('user-profile');
            return back()->with('success', "Profile Picture Changed");
        }

        // dd(Hash::check($old_password, $current_user->password));
        if ($old_password && $new_password) {
            if (Hash::check($old_password, $current_user->password)) {
                $current_user->password =  Hash::make($new_password);
                $current_user->update();
                // return redirect()->route('user-profile');
                return back()->with('success', "Password Changed");
            } else {
                return back()->with('error', 'password မှားနေတယ် ');
            }
            return back();
            $current_user->update();
        }

        $current_user->update();
        return redirect()->route('user-profile');
    }
    function user_profile()
    {
        return view('users.profile');
    }
    function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
