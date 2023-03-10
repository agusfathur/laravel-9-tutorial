<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use GuzzleHttp\Psr7\Response;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     * GET
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.posts.index', [
            "posts" => Post::where('user_id', Auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * GET 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('dashboard.posts.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * POSY
     * cari berdasarkan id / slug,
     * Images, agar image dapat dilihat public sambungkan STORAGE ke folder public
     * di terminal, php artisan storage:link
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'category_id' => 'required',
            // 1024 KB, 1Mb
            'image' => 'image|file|max:1024',
            'body' => 'required'
        ]);

        /**
         * jalankan pahp artisan storage:link, /symbolic link
         * agar gambar bisa diakses public
         * store : pindahkan gambar ke folder storage/...
         * 
         */
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images');
            // access di Front-End
            // {{ asset('storage/' . $post->image) }}
        }
        $validatedData['user_id'] = auth()->user()->id;
        // limit string, 200 huruf
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Post::create($validatedData);
        return redirect('/dashboard/posts')->with('success', 'New post has ben added!');
    }

    /**
     * Display the specified resource.
     * GET
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('dashboard.posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     * GET
     */
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     * PUT
     * $request = data baru,
     * $post = data lama
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required'
        ];



        if ($request->slug != $post->slug) {
            $rules['slug'] = 'required|unique:posts';
        }

        $validatedData = $request->validate($rules);

        // harus dibawah validasi
        // store : pindahkan gambar ke folder storage/...
        if ($request->file('image')) {
            // hapus oldImage jika ada
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }

            $validatedData['image'] = $request->file('image')->store('post-images');
            // access di Front-End
            // {{ asset('storage/' . $post->image) }}
        }

        $validatedData['user_id'] = auth()->user()->id;
        // limit string, 200 huruf
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Post::where('id', $post->id)
            ->update($validatedData);
        return redirect('/dashboard/posts')->with('success', 'Post has ben updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     * DELETE
     */
    public function destroy(Post $post)
    {
        // hapus oldImage jika ada
        if ($post->image) {
            Storage::delete($post->image);
        }
        // delete
        Post::destroy($post->id);
        return redirect('/dashboard/posts')->with('success', 'Post has ben deleted!');
        // redirect()->away('link external');
    }

    // check slug dari fetch js
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
