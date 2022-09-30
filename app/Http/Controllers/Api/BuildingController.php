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
        // gibt die View-Datei buildings aus dem Ordner Building zurück
        // die property "building" werden alle Gebäude aus der Datenbank mitgegeben
        return view('./Building/buildings', [
            'buildings' => Building::all(),
        ]);
    }

    public function showRoom(Building $building, Room $room)
    {
        return view('./Room/room', [
            'building' => $building,
            'room' => $room,
        ]);
    }

    public function store(){
        // validiert die Daten des Requests und erstellt daraus ein neues Gebäude
        // leitet user an url/admin weiter
        $attributes = request()->validate([
            'name' => 'required|max:60'   
        ]);

        Building::create($attributes);
        
        return redirect('/admin');
    }

    public function edit()
    {
        //gibt die View-Datei edit.blade.php aus dem Ordner Buildings zurück
        return view('/Building/edit');
    }

    public function delete(Building $building){
       
        // löscht zuerst alle Räume, welche mit dem Gebäude verknüpft sind und dann auch das Gebäude selber.
        foreach($building->rooms as $room){
            $room->delete();
        }
       
        $building->delete(); 
       
       return back()->with('success','Gebäude entfernt');
    }
}
