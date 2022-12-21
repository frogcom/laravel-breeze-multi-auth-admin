<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController
{

  public function index()
  {
    // dd(auth()->user());
    return view('index', [
      'posts' => Post::all()
    ]);
  }

  public function show(Post $post)
  {
    return view('posts.post', [
      'post' => $post
    ]);
  }
  public function create()
  {
    return view('posts.create');
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
  public static function search(Request $request)
  {
    // dd(Post);
    // IN DE REQUEST VARIABLE ZITTEN ALLE FORM VALUES
    $inputValue = $request->value; //kaas
    $dropdownValue = $request->category; //title, author, body

    if ($inputValue == '' || $dropdownValue == '') {
      return redirect()->route('index');
    }


    if ($dropdownValue == "everything") {

      $names = ['title', 'slug', 'excerpt', 'body'];
    } else if ($dropdownValue == "title") {
      $names = ['id'];
    } else if ($dropdownValue == "author") {
      $names = ['slug'];
    } else if ($dropdownValue == "body") {
      $names = ['excerpt'];
    }

    $query = Post::where($names[0], 'LIKE', '%' . $inputValue . '%');
    for ($i = 1; $i < (count($names) - 1); $i++) {
      $query->orWhere($names[$i], 'LIKE', '%' . $inputValue . '%');
    }
    // dd($query);
    $blogsNew = $query->get();


    return view('posts.post', [
      'posts' => $blogsNew
    ]);
  }
}
