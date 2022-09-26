<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Http\Controllers\Controller;

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

    public function delete(Lesson $lesson){
        $lesson->delete(); 
        
        return back()->with('success','Modul entfernt');
     }
}
