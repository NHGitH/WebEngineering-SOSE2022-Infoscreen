<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\Course;
use App\Models\Professor;
use App\Models\User;
use App\Models\Room;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function posts()
    {
        return view('/User/posts', [

        ]);
    }

    public function modules()
    {
        return view('/User/modules', [

        ]);
    }

    // public function show(User $user)
    // {
    //     return view('login', [
    //         'user' => $user,
    //         'rooms' => Room::latest()->filter(request(['search', 'building']))->get(),
    //         'buildings' => Building::all(),
    //         'currentBuilding' => Building::firstWhere('name', request('building'))
    //     ]);
    // }

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

    public function storeAdmin(){

        $attributes = request()->validate([
            'name' => 'required|max:255',
            'username' => 'required|max:255|min:3|unique:users,username',
            'role' => 'required',
            'password' => 'required|min:7|max:255',
        ]);

        $user = User::create($attributes);

        // session()->flash('success','Your account has been created.');

        return redirect('/admin');
    }


    public function login()
    {
        return view('./User/dashboard', [
            'buildings' => Building::all(),
            'rooms' => Room::all(),
            'courses' => Course::all(),
            'username' => User::firstWhere('username', request('username')),
            'professors' => Professor::all(),
        ]
        );
    }

    public function delete(User $user){
        $user->delete(); 
        
        return back()->with('success','Gebäude entfernt');
     }
    
}
