<?php

use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\BuildingController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\ModuleController;
use App\Http\Controllers\Api\SessionsController;
use App\Http\Controllers\Api\ProfessorController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\RoomController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\DeleteController;
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

Route::get('/test', function(){
    return view("test",[
        'users' => User::all(),
    ]);
});

Route::get('/posts',[PostController::class, 'index']);
Route::get('/posts/{post:slug}',[PostController::class, 'show']);
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

Route::get('/dashboard', [UserController::class, 'login'])->middleware('auth');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest')->name('login');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

Route::group(['middleware' => ['auth']], function() {
    //PostRoutes:
    Route::get('/dashboard/posts', [PostController::class, 'index']);
    Route::post('/dashboard/posts/create', [PostController::class, 'store']);
    Route::get('/dashboard/posts/{post}/edit', [PostController::class, 'edit']);
    Route::patch('/dashboard/posts/{post}', [PostController::class, 'update']);
    Route::delete('/dashboard/posts/{post}', [PostController::class, 'delete']);

    Route::get('/dashboard/modules', [ModuleController::class, 'index']);
});

Route::group(['middleware' => ['admin']], function() {
    //PostRoutes:
    Route::get('/admin',[AdminController::class, 'login'])->middleware('admin');
    Route::get('/admin/posts', [AdminController::class, 'posts']);
    Route::get('/admin/modules', [AdminController::class, 'modules']);
    Route::post('/admin/posts/create', [PostController::class, 'store']);
    Route::get('/admin/posts/{post}/edit', [PostController::class, 'edit']);
    Route::patch('/admin/posts/{post}', [PostController::class, 'update']);
    Route::delete('/admin/posts/{post}', [PostController::class, 'delete']);

    Route::get('admin/buildings', [AdminController::class, 'buildings']);
    Route::delete('admin/rooms/{builidng}', [BuildingController::class, 'delete']);
    Route::delete('admin/courses/{course}', [CourseController::class, 'delete']);
    Route::delete('admin/room/{room}', [RoomController::class, 'delete']);

    Route::get('admin/rooms', [AdminController::class, 'rooms']);
    Route::get('admin/courses', [AdminController::class, 'courses']);
    Route::get('admin/users', [AdminController::class, 'users']);
}); 