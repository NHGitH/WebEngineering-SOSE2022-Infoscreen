<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Http\Controllers\Controller;
use App\Models\Room;

class LessonController extends Controller
{
    //
    public function index()
    {
        return view('/User/lessons', [

        ]);
    }

    public function create()
    {
        return view('./Lessons/create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'module_id' => 'required',
            'room_id' => 'required',
            'date' => 'required',
            'time' => 'required',
        ]);

        Lesson::create($attributes);


        return redirect('/dashboard');
    }

    public function edit(Lesson $lesson){
        return view('/Lesson/edit',[
            'lesson' => $lesson,
            'rooms' => Room::all(),
        ]);
    }

    public function update(Lesson $lesson){

        $attributes = request()->validate([
            'module_id' => 'required',
            'room_id' => 'required',
            'date' => 'required',
            'time' => 'required',
        ]);

        $lesson->update($attributes);

        return redirect('dashboard/lessons');
    }

    public function delete(Lesson $lesson){
        $lesson->delete(); 
        
        return back()->with('success','Modul entfernt');
     }
}
