<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function create()
    {
        return view('Administration/create');
    }

    public function store()
    {
        return "Hello World";
    }
}
