<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function store()
    {   //creates and stores a module given by an incoming request. redirects to admin.
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'user_id' => 'required',
            'course_id' => 'required',
        ]);

        Module::create($attributes);


        return redirect('/admin');
    }

    public function delete(Module $module){
        //deletes a given module in database.
        $module->delete(); 
        return back()->with('success','Modul entfernt');
     }
}
