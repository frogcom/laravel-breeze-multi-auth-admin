<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.posts');
    }

    public function posts()
    {
        return view('admin.posts', [
            'posts' => Post::all()
                ->sortByDesc('updated_at')
        ]);
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => 'required',
            'slug' => ['required', Rule::unique('posts', 'slug')],
            'excerpt' => 'required',
            'body' => 'required',
        ]);

        Post::create($attributes);

        return redirect('/');
    }

    public function edit()
    {
        return view('admin.edit-post');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('succes', 'Post Deleted!');
    }
}
