<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\Course;
use App\Models\Professor;
use App\Models\User;
use App\Models\Post;
use App\Models\Room;
use App\Models\Module;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function posts()
    {
        return view('/Admin/posts', [
            'posts' => Post::all(),
        ]);
    }

    public function buildings()
    {
        return view('/Admin/buildings', [
            'buildings' => Building::all(),
        ]);
    }

    public function users()
    {
        return view('/Admin/users', [
            'users' => User::all(),
        ]);
    }

    public function courses()
    {
        return view('Admin/courses',
        [
            'courses' => Course::all(),
        ]);
    }

    public function rooms()
    {
        return view('/Admin/rooms', [
            'rooms' => Room::all(),
        ]);
    }

    public function modules()
    {
        return view('/Admin/modules', [
            'modules' => Module::all(),
        ]);
    }

    public function create(){
        return view('./User/create');
    }

    public function store(){

        $attributes = request()->validate([
            'name' => 'required|max:255',
            'username' => 'required|max:255|min:3|unique:users,username',
            'role' => 'required',
            'password' => 'required|min:7|max:255',
        ]);

        $user = User::create($attributes);

        // session()->flash('success','Your account has been created.');

        auth()->login($user);

        return redirect('/dashboard');
    }


    public function login()
    {
        return view('./Admin/dashboard', [
            'buildings' => Building::all(),
            'rooms' => Room::all(),
            'courses' => Course::all(),
            'username' => User::firstWhere('username', request('username')),
            'professors' => Professor::all(),
        ]
        );
    }
    
}
