<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{

    public function posts()
    {
        return view('admin.posts', [
            'posts' => Post::query()->paginate(10)
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

        return redirect('/admin/posts');
    }
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('admin.edit-post', compact('post'));
    }

    public function update($id)
    {

        Post::find($id)->update([
            'title' => request('title'),
            'slug' => request('slug'),
            'excerpt' =>  request('excerpt'),
            'body' => request('body'),


        ]);

        return back()->with('succes', 'Updated');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('succes', 'Post Deleted!');
    }




    public function editSettings()
    {
        return view('admin.settings');
    }

    public function updateSettings()
    {
        $singleton = Settings::getInstance();
        $singleton->setData();

        return redirect('/admin/settings');
    }
}
