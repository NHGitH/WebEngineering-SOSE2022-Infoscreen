<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        return view('rooms', [
            'rooms' => Room::all()
        ]);
    }

    public function show(Room $room)
    {
        return view('room', [
            'rooms' => $room,
        ]);
    }

    public function create()
    {
        return view('./Room/create');
    }

    public function store(){

        $attributes = request()->validate([
            'name' => 'required|max:255',
            'slug' => 'required|max:255',
            'buidling_id' => 'required',
        ]);

        Room::create($attributes);


        return redirect('/dashboard');
    }
}
