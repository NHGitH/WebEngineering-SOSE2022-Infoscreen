<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use App\Models\Room;
use App\Models\Module;
use App\Models\Building;
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

Route::get('test', function(User $user){
    return view('admin', [
        'user'=>$user,
    ]);
});


Route::get('rooms/{room:name}', function(Room $room){
    return view('room', [
        'room'=> $room,
    ]);
});

Route::get('rooms', function(){
    return view('rooms', [
        'rooms' => Room::all(),
    ]);
});

Route::get('buildings/{building:name}', function(Building $building){
    return view('building', [
        'building' => $building,
    ]);
});

Route::get('buildings/{building:name}/{room:name}', function(Building $building, Room $room){
    return view('room', [
        'building' => $building,
        'room' => $room,
    ]);
});

Route::get('buildings', function(){
    return view('buildings', [
        'buildings' => Building::all(),
    ]);
});


Route::get('administration/{user:username}', function(User $user){
    return view('admin', [
        'user'=>$user,
    ]);
});        


Route::get('modules/{module:slug}', function(Module $module){
    return view('module', [
        'module' => $module,
    ]);
});

Route::get('modules/', function(){
    return view('infoscreen', [
        'modules' => Module::all(),
    ]);
});
