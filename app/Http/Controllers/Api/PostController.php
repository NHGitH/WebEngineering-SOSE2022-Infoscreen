<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        return view('/User/posts', []);
    }

    public function show(Post $post)
    {
        return view('post', [
            'post' => $post,
        ]);
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $request->validate([
                'title' => 'required',
                'body' => 'required',
                'image' => 'nullable|mimes:png'
            ]);

            $newImageName = Str::random(10) . '-' . $request->file('image')->getFilename() . '.' .
                $request->image->extension();

            $request->image->move(public_path('images'), $newImageName);
            $post = Post::create([
                'title' => $request->input('title'),
                'body' => $request->input('body'),
                'user_id' => auth()->id(),
                'picture_path' => $newImageName,
                'published_at' => date('Y-m-d'),
            ]);
        } else {
            $request->validate([
                'title' => 'required',
                'body' => 'required',
            ]);
            $post = Post::create([
                'title' => $request->input('title'),
                'body' => $request->input('body'),
                'user_id' => auth()->id(),
                'picture_path' => '/illustration-1.png',
                'published_at' => date('Y-m-d'),
            ]);
        }

        return redirect('/dashboard');
    }

    public function edit(Post $post)
    {
        return view('/Post/edit', [
            'post' => $post,
        ]);
    }

    public function update(Post $post)
    {

        if (request()->hasFile('image')) {
            request()->validate([
                'title' => 'required',
                'body' => 'required',
                'image' => 'nullable|mimes:png'
            ]);

            $newImageName = Str::random(10) . '-' . request()->file('image')->getFilename() . '.' .
                request()->image->extension();

            request()->image->move(public_path('images'), $newImageName);
            $post->update([
                'title' => request()->input('title'),
                'body' => request()->input('body'),
                'user_id' => auth()->id(),
                'picture_path' => $newImageName,
            ]);
        } else {
            request()->validate([
                'title' => 'required',
                'body' => 'required',
            ]);
            $post->update([
                'title' => request()->input('title'),
                'body' => request()->input('body'),
                'user_id' => auth()->id(),
                'picture_path' => '/illustration-1.png',
            ]);
        }

        return redirect('dashboard/posts');
    }

    public function delete(Post $post)
    {
        $post->delete();
        return back()->with('success', 'Gebäude entfernt');
    }
}
