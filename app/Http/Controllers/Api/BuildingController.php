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
        return view('./Building/buildings', [
            'buildings' => Building::all(),
        ]);
    }

    public function show(Building $building)
    {
        return view('./Building/building', [
            'building' => $building,
        ]);
    }

    public function showRoom(Building $building, Room $room)
    {
        return view('./Room/room', [
            'building' => $building,
            'room' => $room,
        ]);
    }

    public function create()
    {
        return view('./Building/create');


    }

    public function store(){

        $attributes = request()->validate([
            'name' => 'required|max:255'   
        ]);

        Building::create($attributes);

        
        return redirect('/dashboard');
    }
}
