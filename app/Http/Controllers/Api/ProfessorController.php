<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Professor;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProfessorController extends Controller
{
    public function index()
    {
        return Professor::all();
    }

    public function create()
    {
        return view('Professors/create');
    }


    public function store(Request $request)
    {
        if($request->hasFile('image')){
            $newImageName = Str::random(10) . '-' . $request->file('image')->getFilename() . '.' . 
            $request->image->extension();
    
            $request->image->move(public_path('images'), $newImageName);
            
            $attributes = $request->validate([
                'name' => 'required|max:255',
                'image' => 'nullable|mimes:jpg,png,jpeg|max:5048'
            ]);
            $attributes['picture_path'] = $newImageName;
            
        }
        else{
            $attributes = $request->validate([
                'name' => 'required|max:255',
                'image' => 'nullable|mimes:jpg,png,jpeg|max:5048'
            ]);
            $attributes['picture_path'] = 'pexels-cottonbro-6334771.jpg';
        }

        Professor::create($attributes);


        return redirect('/dashboard');
    }
}
