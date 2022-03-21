<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    function index()
    {
        $posts = Post::latest()->paginate(9);
        return view('home', ['posts' => $posts]);
    }
    function create_post()
    {
        return view('users.create-post');
    }    
    function create_post_data()
    {
        $validation = request()->validate([
            "title" => "required",
            "image" => "required",
            "content" => "required"
        ]);
        if ($validation) {
            $title = request('title');
            $image = request('image');
            $content = request('content');

            $post = new Post();
            $post->user_id = auth()->user()->id;
            $post->title = $title;

            $image_name = uniqid() . "_" . $image->getClientOriginalName();
            $image->move(public_path("img/posts/"), $image_name);
            $post->image = $image_name;
            $post->content = $content;
            $post->save();
            return redirect()->route('index');
        } else {
            return back()->with($validation);
        }
    }
    function contact_us()
    {
        return view('users.contact-us');
    }
    
}
