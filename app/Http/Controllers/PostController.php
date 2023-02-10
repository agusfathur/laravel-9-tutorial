<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {

        // Post::whereFullText('body', 'sed');
        $title = ' ';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }

        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }


        return view('posts', [
            "title" => "All Posts" . $title,
            'active' => 'posts',
            // "posts" => Post::all()
            // eager loading
            "posts" => Post::latest()->filter(request(['search', 'category', 'author']))
                ->paginate(7)->withQueryString()
            // withQueryString() = apapun yang ada di query string bawa atau URLnya terbawa

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

    public function laravel9()
    {
        // lv8
        // route name, [data]
        // return redirect()->route('login', ['id' => 10]);

        // lv9
        return to_route('login', ['id' => 10]);
    }
}
