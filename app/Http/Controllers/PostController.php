<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('posts', [
            "title" => "All Posts",
            'active' => 'posts',
            // "posts" => Post::all()
            // eager loading
            "posts" => Post::latest()->get()
        ]);
    }

    public function show(Post $post)
    {
        return view('post', [
            "title" => "single post",
            'active' => 'posts',
            "post" => $post
        ]);
    }
}