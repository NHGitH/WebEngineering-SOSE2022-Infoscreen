<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\Professor;
use App\Models\User;
use App\Models\Room;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {

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
            'role' => '',
            'password' => 'required|min:7|max:255',
        ]);

        $user = User::create($attributes);

        // session()->flash('success','Your account has been created.');

        auth()->login($user);

        return redirect('/');
    }


    public function login()
    {
        return view('./Administration/create', [
           // 'professors' => professors::all(),
            'buildings' => Building::all(),
            'user' => User::firstWhere('username', request('username'))
        ]


        );
        
    }
    
}
