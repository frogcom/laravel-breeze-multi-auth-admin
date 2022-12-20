<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class SiteController extends Controller
{

    public function index()
    {
        // dd(auth()->user());
        return view('home', [
            'posts' => Post::all()
        ]);
    }

    public function profile()
    {
        return view('profile');
    }
}
