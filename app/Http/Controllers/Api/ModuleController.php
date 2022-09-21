<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function index(){
        return Module::all();
    }

    public function create()
    {
        return view('./Modules/create');
    }

    public function store()
    {
        

            $attributes = request()->validate([
                'name' => 'required|max:255',
                'room_id' => 'required|max:255',
                'prof_id' => 'required',
                'courses_id' => 'required',
                
                
                
            ]);
    
            Module::create($attributes);
    
    
            return redirect('/profs');
        
}
