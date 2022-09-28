<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        return view('/Admin/news', [
            'news' => News::all(),
        ]);
    }

    public function show()
    {
        return view('/User/news', [
            'news' => News::all(),
        ]);
    }

    public function create()
    {
        return view('/Lessons/create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'post_id' => 'required',
            'module_id' => 'nullable',
            'room_id' => 'nullable',
        ]);

        News::create($attributes);


        return redirect('/dashboard');
    }

    public function edit(News $news){
        return view('/News/edit',[
            'news' => $news,
        ]);
    }

    public function update(News $news){

        $attributes = request()->validate([
            'post_id' => 'required',
            'module_id' => 'nullable',
            'room_id' => 'nullable',
        ]);

        $news->update($attributes);

        return redirect('admin/news');
    }

    public function delete(News $news){
        $news->delete(); 
        
        return back()->with('success','News entfernt');
     }
}
