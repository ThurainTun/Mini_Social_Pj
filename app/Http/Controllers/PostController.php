<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function postsById($id)
    {
        $post = Post::find($id);
        return view('users.postsById', ['post' => $post]);
    }
    function postsUpdate($id)
    {
        $updateData = Post::find($id);
        return view('users.postsUpdate', ['updateData' => $updateData]);
    }
    function postsUpdateData($id)
    {
        $title = request('title');
        $image = request('image');
        $content = request('content');

        $updateData = Post::find($id);
        $updateData->title = $title;
        $updateData->content = $content;
        if ($image) {
            $image_name = uniqid() . "_" . $image->getClientOriginalName();
            $image->move(public_path("img/posts/"), $image_name);
            $updateData->image = $image_name;
        }
        $updateData->update();
        return redirect()->route('index');
    }
    function postsDelete($id)
    {
        $delete_post = Post::find($id);
        $delete_post->delete();
        return redirect()->route('index');
    }
}
