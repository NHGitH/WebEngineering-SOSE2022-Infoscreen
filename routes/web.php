<?php

use App\Http\Controllers\Api\BuildingController;
use App\Http\Controllers\Api\ModuleController;
use App\Http\Controllers\Api\SessionsController;
use App\Http\Controllers\Api\ProfessorController;
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
    return view("/login",[

    ]);
});

Route::get('/posts',[PostController::class, 'index']);
Route::get('/posts/{post:slug}',[PostController::class, 'show']);
Route::get('administration/{user:id}',[UserController::class,'show']);  
Route::get('login/{user:id}',[UserController::class,'show']); 
Route::get('/buildings',[BuildingController::class, 'index']);
Route::get('/buildings/{building:name}',[BuildingController::class, 'show']);
Route::get('/buildings/{building:name}/{room:name}',[BuildingController::class, 'showRoom']);

Route::get('register', [UserController::class, 'create'])->middleware('guest');
Route::post('register', [UserController::class, 'store'])->middleware('guest');

Route::get('building', [BuildingController::class, 'create']);
Route::post('building', [BuildingController::class, 'store']);

Route::get('/room/test', [RoomController::class, 'show']);
Route::get('room', [RoomController::class, 'create']);
Route::post('room', [RoomController::class, 'store']);

Route::get('dashboard', [UserController::class, 'login']);

Route::get('profs', [ProfessorController::class, 'create']);
Route::post('profs', [ProfessorController::class, 'store']);

Route::get('modules', [ModuleController::class, 'create']);
Route::post('modules', [ModuleController::class, 'store']);

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionsController::class, 'destroy']);

Route::post('/dashboard/posts', [PostController::class, 'store']);
Route::post('/dashboard/modules', [ModuleController::class, 'store']);
Route::post('/dashboard/rooms', [RoomController::class, 'store']);
Route::post('/dashboard/buildings', [BuildingController::class, 'store']);
