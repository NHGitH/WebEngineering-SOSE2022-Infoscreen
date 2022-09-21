<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function create()
    {
        return view('/login');
    }

    public function store(){
        $attributes = request()->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if(auth()->attempt($attributes)){
            session()->regenerate();
            return redirect('/User/dashboard')->with('success','Welcome Back!');
        }

        return back()
                ->withInput()
                ->withErrors(['username' => 'Your provided credentials could not be verified.']);
    }

    public function destroy()
    {
        auth()->logout();
        return redirect('/login')->with('success', 'Goodbye!');
    }
}
