<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use App\Models\Room;
use App\Models\Veranstaltung;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

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
    $posts = Post::all();
    return view('posts', [
        'posts' => Post::latest()->get(),
        'categories' => Category::all(),
    ]);
});

Route::get("posts/{post:slug}", function (Post $post){

    // Find a post by its slug and pass it to a view called "post"

    return view('post', [
        'post'=> $post,
        
    ]);
});

Route::get('categories/{category:slug}', function(Category $category){
    return view('posts', [
        'posts'=> $category->posts,
        'currentCategory' => $category,
        'categories' => Category::all(),
    ]);
});

Route::get('authors/{author:username}', function(User $author){
    return view('posts', [
        'posts'=> $author->posts,
        'categories' => Category::all(),
    ]);
});

Route::get('test', function(User $author){
    return view('test-html', [

    ]);
});

Route::get('rooms/{room:slug}', function(Room $room){
    return view('room', [
        'veranstaltung' => $room->veranstaltung(),
    ]);
});
