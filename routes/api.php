<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BuildingController;
use App\Http\Controllers\Api\ModuleController;
use App\Http\Controllers\Api\RoomController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\ProfessorController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('buildings', [BuildingController::class,'index']);
Route::get('professors', [ProfessorController::class,'index']);
Route::get('courses', [CourseController::class,'index']);
Route::get('rooms', [RoomController::class,'index']);
Route::get('modules', [ModuleController::class,'index']);
