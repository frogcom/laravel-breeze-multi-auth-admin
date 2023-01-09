<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class SiteController extends Controller
{

    public function index()
    {
        return view('home', [
            'posts' => Post::orderBy('id', 'asc')->paginate(6)
        ]);
    }

    public function profile()
    {
        return view('profile');
    }
}
