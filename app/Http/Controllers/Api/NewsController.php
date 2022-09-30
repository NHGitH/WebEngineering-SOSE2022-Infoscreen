<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Building;
use App\Models\Post;

class NewsController extends Controller
{
    public function index()
    {   //returns the view for News created by a User
        return view('/User/news', [
            'newslist' => News::all(),
        ]);
    }

    public function store()
    {    //creates and stores a News-link into the database
        $attributes = request()->validate([
            'post_id' => 'required',
            'module_id' => 'unique:news,module_id|nullable',
            'building_id' => 'nullable',
        ]);

        News::create($attributes);


        return redirect('/dashboard');
    }

    
    public function storeAdmin()
    {    //creates and stores a News-link into the database returns user to /admin
        $attributes = request()->validate([
            'post_id' => 'required',
            'module_id' => 'unique:news,module_id|nullable',
            'building_id' => 'required',
        ]);

        News::create($attributes);


        return redirect('/admin');
    }

    public function edit(News $news){
        //returns view to edit a single News-link, which is given as input and returns to dashboard
        return view('/News/edit',[
            'news' => $news,
        ]);
    }

    public function editAdmin(News $news){
        //returns view to edit a single News-link, which is given as input and returns to dashboard
        return view('/News/editAdmin',[
            'news' => $news,
            'buildings' => Building::all(),
            'posts' => Post::all(),
        ]);
    }

    public function update(News $news){
        //updates the News-link which is given and returns to the news-dashboard
        $attributes = request()->validate([
            'post_id' => 'required',
            'module_id' => 'unique:news,module_id|nullable',
            'building_id' => 'nullable',
        ]);

        $news->update($attributes);

        return redirect('dashboard/news');
    }

    public function updateAdmin(News $news){
        //updates the News-link which is given and returns to the news-dashboard
        $attributes = request()->validate([
            'post_id' => 'required',
            'module_id' => 'unique:news,module_id|nullable',
            'building_id' => 'required',
        ]);

        $news->update($attributes);

        return redirect('admin/news');
    }

    public function delete(News $news){
        //deletes given News-link in database
        $news->delete(); 
        return back()->with('success','News entfernt');
     }
}
