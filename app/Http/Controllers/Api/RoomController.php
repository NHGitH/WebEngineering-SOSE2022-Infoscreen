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
}
