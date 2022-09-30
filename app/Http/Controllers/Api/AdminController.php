<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\Course;
use App\Models\Professor;
use App\Models\User;
use App\Models\Post;
use App\Models\Room;
use App\Models\Module;
use App\Models\News;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function posts()
    {
        // gibt die View-Datei posts.blade.php aus dem Ordner Admin in views aus und weist der Variable 'posts' eine gefilterte Liste aus,
        // welche durch die Methode search generiert wird.
        return view('/Admin/posts', [
            'posts' => Post::latest()->search(request(['post']))->get(),
        ]);
    }

    public function buildings()
    {
        // gibt die View-Datei buildings.blade.php aus dem Ordner Admin in views aus und weist der Variable 'buildings' eine gefilterte Liste aus,
        // welche durch die Methode search generiert wird.
        return view('/Admin/buildings', [
            'buildings' => Building::latest()->search(request(['building']))->get(),
        ]);
    }

    public function users()
    {
        // gibt die View-Datei users.blade.php aus dem Ordner Admin in views aus und weist der Variable 'users' eine gefilterte Liste aus,
        // welche durch die Methode search generiert wird.
        return view('/Admin/users', [
            'users' => User::latest()->search(request(['user']))->get(),
        ]);
    }

    public function news()
    {
        // gibt die View-Datei news.blade.php aus dem Ordner Admin in views aus und weist der Variable 'news' eine gefilterte Liste aus,
        // welche durch die Methode search generiert wird.
        return view('/Admin/news', [
            'newslist' => News::latest()->search(request(['news']))->get(),
        ]);
    }

    public function courses()
    {
        // gibt die View-Datei courses.blade.php aus dem Ordner Admin in views aus und weist der Variable 'courses' eine gefilterte Liste aus,
        // welche durch die Methode search generiert wird.
        return view('Admin/courses',
        [
            'courses' => Course::latest()->search(request(['course']))->get(),
        ]);
    }

    public function rooms()
    {
        // gibt die View-Datei rooms.blade.php aus dem Ordner Admin in views aus und weist der Variable 'rooms' eine gefilterte Liste aus,
        // welche durch die Methode search generiert wird.
        return view('/Admin/rooms', [
            'rooms' => Room::latest()->search(request(['room']))->get(),
        ]);
    }

    public function modules()
    {
        // gibt die View-Datei modules.blade.php aus dem Ordner Admin in views aus und weist der Variable 'modules' eine gefilterte Liste aus,
        // welche durch die Methode search generiert wird.
        return view('/Admin/modules', [
            'modules' => Module::latest()->search(request(['module']))->get(),
        ]);
    }

    public function login()
    {
        // gibt View-Datei dashboard.blade.php aus dem Ordner Admin aus und gibt dieser Listen von allen wichtigen Properties.
        return view('./Admin/dashboard', [
            'buildings' => Building::all(),
            'posts' => Post::all(),
            'rooms' => Room::all(),
            'courses' => Course::all(),
            'username' => User::firstWhere('username', request('username')),
            'users' => User::all(),
        ]
        );
    }
    
}
