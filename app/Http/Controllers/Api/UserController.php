<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\User;
use App\Models\Room;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {

    }

    public function show(User $user)
    {
        return view('admin', [
            'user' => $user,
            'rooms' => Room::latest()->filter(request(['search', 'building']))->get(),
            'buildings' => Building::all(),
            'currentBuilding' => Building::firstWhere('name', request('building'))
        ]);
    }
}
