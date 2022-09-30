<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\Building;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        return view('/Room/rooms', [
            'rooms' => Room::latest()->filter(request(['search','building']))->get(),
            'buildings' =>Building::all(),
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
            'name' => 'required|max:50',
            'building_id' => 'required',
        ]);

        Room::create($attributes);

        return redirect('/admin');
    }

    public function delete(Room $room){
        
        foreach($room->lessons as $lesson){
            $lesson->delete();
        }

        $room->delete(); 
        
        return back()->with('success','Gebäude entfernt');
    }
}
