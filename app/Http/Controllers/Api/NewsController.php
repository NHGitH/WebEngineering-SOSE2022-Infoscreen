<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {   //returns the view for News created by a User
        return view('/User/news', [
            'newslist' => News::all(),
        ]);
    }

    // //returns view t
    // public function create()
    // {
    //     return view('/Lessons/create');
    // }

    public function store()
    {    //creates and stores a News-link into the database
        $attributes = request()->validate([
            'post_id' => 'required',
            'module_id' => 'unique:news,module_id|nullable',
            'room_id' => 'unique:news,room_id|nullable',
        ]);

        News::create($attributes);


        return redirect('/dashboard');
    }

    public function edit(News $news){
        //returns view to edit a single News-link, which is given as input and returns to dashboard
        return view('/News/edit',[
            'news' => $news,
        ]);
    }

    public function update(News $news){
        //updates the News-link which is given and returns to the news-dashboard
        $attributes = request()->validate([
            'post_id' => 'required',
            'module_id' => 'unique:news,module_id|nullable',
            'room_id' => 'unique:news,room_id|nullable',
        ]);

        $news->update($attributes);

        return redirect('dashboard/news');
    }

    public function delete(News $news){
        //deletes given News-link in database
        $news->delete(); 
        return back()->with('success','News entfernt');
     }
}
