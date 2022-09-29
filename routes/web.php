<?php

use App\Http\Controllers\Api\NewsController;
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
use App\Http\Controllers\Api\LessonController;
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
    return view("/login", []);
});

Route::get('/test', function () {
    return view("test", [
        'users' => User::all(),
    ]);
});


Route::get('/rooms', [RoomController::class, 'index']);

Route::get('/buildings', [BuildingController::class, 'index']);
Route::get('/buildings/{building:name}', [BuildingController::class, 'show']);
Route::get('/buildings/{building:name}/{room:name}', [BuildingController::class, 'showRoom']);

Route::get('register', [UserController::class, 'create'])->middleware('guest');
Route::post('register', [UserController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest')->name('login');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

Route::group(['middleware' => ['auth']], function () {
    //PostRoutes:
    Route::get('/dashboard', [UserController::class, 'login']);
    Route::get('/dashboard/posts', [PostController::class, 'index']);
    Route::post('/dashboard/posts/create', [PostController::class, 'store']);
    Route::get('/dashboard/posts/{post}/edit', [PostController::class, 'edit']);
    Route::patch('/dashboard/posts/{post}', [PostController::class, 'update']);
    Route::delete('/dashboard/posts/{post}', [PostController::class, 'delete']);

    Route::get('/dashboard/news', [NewsController::class, 'index']);
    Route::post('/dashboard/news/create', [NewsController::class, 'store']);
    Route::get('/dashboard/news/{news}/edit', [NewsController::class, 'edit']);
    Route::delete('/dashboard/news/{news}', [NewsController::class, 'delete']);
    Route::patch('/dashboard/news/{news}', [NewsController::class, 'update']);

    Route::get('/dashboard/lessons', [LessonController::class, 'index']);
    Route::post('/dashboard/lessons/create', [LessonController::class, 'store']);
    Route::get('/dashboard/lessons/{lesson}/edit', [LessonController::class, 'edit']);
    Route::patch('/dashboard/lessons/{lesson}', [LessonController::class, 'update']);
    Route::delete('/dashboard/lessons/{lesson}', [LessonController::class, 'delete']);
});

Route::group(['middleware' => ['admin', 'auth']], function () {
    //PostRoutes:
    Route::get('/admin', [AdminController::class, 'login']);

    Route::get('/admin/posts', [AdminController::class, 'posts']);
    Route::post('/admin/posts/create', [PostController::class, 'store']);
    Route::get('/admin/posts/{post}/edit', [PostController::class, 'edit']);
    Route::patch('/admin/posts/{post}', [PostController::class, 'update']);
    Route::delete('/admin/posts/{post}', [PostController::class, 'delete']);

    Route::get('admin/rooms', [AdminController::class, 'rooms']);
    Route::post('/admin/rooms/create', [RoomController::class, 'store']);
    Route::get('/admin/rooms/{room}/edit', [RoomController::class, 'edit']);
    // Route::patch('/admin/rooms/{room}', [RoomController::class, 'update']);
    Route::delete('/admin/rooms/{room}', [RoomController::class, 'delete']);

    Route::get('admin/buildings', [AdminController::class, 'buildings']);
    Route::post('/admin/buildings/create', [BuildingController::class, 'store']);
    Route::get('/admin/buildings/{building}/edit', [BuildingController::class, 'edit']);
    // Route::patch('/admin/buildings/{building}', [BuildingController::class, 'update']);
    Route::delete('/admin/buildings/{building}', [BuildingController::class, 'delete']);

    Route::get('admin/courses', [AdminController::class, 'courses']);
    Route::post('/admin/courses/create', [CourseController::class, 'store']);
    Route::get('/admin/courses/{course}/edit', [CourseController::class, 'edit']);
    // Route::patch('/admin/courses/{course}', [CourseController::class, 'update']);
    Route::delete('/admin/courses/{course}', [CourseController::class, 'delete']);

    Route::get('/admin/modules', [AdminController::class, 'modules']);
    Route::post('/admin/modules/create', [ModuleController::class, 'store']);
    Route::get('/admin/modules/{module}/edit', [ModuleController::class, 'edit']);
    // Route::patch('/admin/modules/{module}', [ModuleController::class, 'update']);
    Route::delete('/admin/modules/{module}', [ModuleController::class, 'delete']);

    Route::get('admin/users', [AdminController::class, 'users']);
    Route::post('/admin/users/create', [UserController::class, 'storeAdmin']);
    Route::get('/admin/users/{user}/edit', [UserController::class, 'edit']);
    // Route::patch('/admin/users/{user}', [UserController::class, 'update']);
    Route::delete('/admin/users/{user}', [UserController::class, 'delete']);

    Route::get('admin/news', [AdminController::class, 'news']);
    Route::post('/admin/news/create', [NewsController::class, 'storeAdmin']);
    Route::get('/admin/news/{news}/edit', [NewsController::class, 'edit']);
    Route::patch('/admin/news/{news}', [NewsController::class, 'updateAdmin']);
    Route::delete('/admin/news/{news}', [NewsController::class, 'delete']);
});
