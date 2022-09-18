<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Building;
use App\Models\Room;

class BuildingController extends Controller
{
    public function index()
    {     
        return view('buildings', [
            'buildings' => Building::all(),
        ]);
    }

    public function show(Building $building)
    {
        return view('building', [
            'building' => $building,
        ]);
    }

    public function showRoom(Building $building, Room $room)
    {
        return view('room', [
            'building' => $building,
            'room' => $room,
        ]);
    }
}
