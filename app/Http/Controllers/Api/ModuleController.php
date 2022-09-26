<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function index()
    {
        return view('/User/modules', [

        ]);
    }

    public function modules(){
    }

    public function create()
    {
        return view('./Modules/create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'user_id' => 'required',
            'courses_id' => 'required',
        ]);

        Module::create($attributes);


        return redirect('/admin');
    }

    public function delete(Module $module){
        $module->delete(); 
        
        return back()->with('success','Modul entfernt');
     }
}
