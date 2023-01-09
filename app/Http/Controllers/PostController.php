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
      $names = ['title'];
    } else if ($dropdownValue == "author") {
      $names = ['slug'];
    } else if ($dropdownValue == "body") {
      $names = ['excerpt'];
    }
    // dd($inputValue);
    $query = Post::where($names[0], 'LIKE', '%' . $inputValue . '%');
    for ($i = 1; $i < (count($names) - 1); $i++) {
      $query->orWhere($names[$i], 'LIKE', '%' . $inputValue . '%');
    }

    $blogsNew = $query->get();
    // dd($blogsNew);

    return view('home', [
      'posts' => $blogsNew
    ]);
  }
}
