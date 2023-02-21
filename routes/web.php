<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\CokController;
use App\Http\Controllers\DashboardPostController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home', [
        "title" => "Home",
        'active' => "home",
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        'active' => "about",
        "name" => "Moh Agus Fathur Rozi",
        "email" => "Agusfathur25@gmai.com",
        "image" => "pp.jpg"
    ]);
});


Route::get('/posts', [PostController::class, 'index']);

//  post:slug, cari post WHERE slug = :slug
Route::get('posts/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', function () {
    return view('categories', [
        'title' => 'Post Categories',
        'active' => 'categories',
        'categories' => Category::all()
    ]);
});

// Route::get('/categories/{category:slug}', function (Category $category) {
//     return view('posts', [
//         'title' => "Post By Category : $category->name",
//         'active' => 'categories',
//         // panggil method relasi
//         // lazy eager lpading
//         'posts' => $category->posts->load('category', 'author'),
//     ]);
// });

// Route::get('/authors/{author:username}', function (User $author) {
//     return view('posts', [
//         'title' => "Post By Author : $author->name",
//         'active' => 'posts',
//         // panggil method relasi
//         // lazy eager lpading
//         'posts' => $author->posts->load('category', 'author'),
//     ]);
// });

// name('login') = penanda route login, middleware('auth') = route diakses harus login
// Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
// Route::post('/login', [LoginController::class, 'authenticate']);

// Lv 9 , grouping route non resource
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login')->middleware('guest');
    Route::post('/login', 'authenticate');
    Route::post('/logout', 'logout');
});


Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'index')->middleware('guest');
    Route::post('/register', 'store');
});


// membuat awalan url route
Route::prefix('/dashboard')->group(function () {
    // jika tida auth maka dilempar ke login
    // middleware harus auth, jika guest, akan dikembalikan ke login
    Route::get('/', function () {
        return view('dashboard.index');
    })->middleware('auth');

    // Fetch API sluggable library
    Route::get('/checkSlug', [DashboardPostController::class, 'checkSlug'])
        ->middleware('auth');

    Route::resource('/posts', DashboardPostController::class)->middleware('auth');

    Route::resource('/categories', AdminCategoryController::class)->except('show');
});
