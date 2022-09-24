<?php

namespace App\Http\Controllers;
use App\Models\Building;
use App\Models\User;
use App\Models\Room;
use App\Models\Professor;
use App\Models\Module;
use App\Models\Course;


use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function user(User $user){ $user->delete(); return back()->with('success','Benutzer entfernt');}

    public function room(Room $room){ $room->delete(); return back()->with('success','Raum entfernt');}

    public function professor(Professor $professor){ $professor->delete(); return back()->with('success','Professor entfernt');}

    public function module(Module $module){ $module->delete(); return back()->with('success','Modul entfernt');}

    public function course(Course $course){ $course->delete(); return back()->with('success','Kurs entfernt');}

    public function building(Building $building){ $building->delete(); return back()->with('success','Gebäude entfernt');}
}
