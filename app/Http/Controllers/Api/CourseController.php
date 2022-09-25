<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(){
        return Course::all();
    }

    public function store(){
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'building_id' => 'required',
        ]);

        Course::create($attributes);

        return redirect('/dashboard');
    }

    public function delete(Course $course){
        $course->delete(); 
        
        return back()->with('success','Kurs entfernt');
     }
}
