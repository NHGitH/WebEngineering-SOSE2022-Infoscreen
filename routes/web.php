<?php

use App\Http\Controllers\Api\BuildingController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\RoomController;
use App\Http\Controllers\Api\UserController;
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
Route::get('/', function(){
    return view('login');
});

Route::get('/login', function(){
    return view('login');
});

Route::get('/posts',[PostController::class, 'index']);
Route::get('/posts/{post:slug}',[PostController::class, 'show']);
Route::get('administration/{user:id}',[UserController::class,'show']); //view: admin 
Route::get('/buildings',[BuildingController::class, 'index']); //view: buildings 
Route::get('/buildings/{building:name}',[BuildingController::class, 'show']); //view: building
Route::get('/buildings/{building:name}/{room:name}',[BuildingController::class, 'showRoom']);//view: room

Route::get('register', [UserController::class, 'create'])->middleware('guest');
Route::post('register', [UserController::class, 'store'])->middleware('guest');

Route::get('building/register', [BuildingController::class, 'create']);
Route::post('building/register', [BuildingController::class, 'store']);

Route::get('room/register', [RoomController::class, 'create']);
Route::post('room/register', [RoomController::class, 'store']);
