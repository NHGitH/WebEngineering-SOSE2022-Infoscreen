<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Professor;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    public function index(){
        return Professor::all();
    }

    public function create()
    {
        return view('Professors/create');
    }

    
        public function store(){

            $attributes = request()->validate([
                'name' => 'required|max:255',
                
                
            ]);
    
            Professor::create($attributes);
    
    
            return redirect('/profs');
        }
    }

