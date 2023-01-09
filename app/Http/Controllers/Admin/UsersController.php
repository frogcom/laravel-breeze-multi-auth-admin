<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function users()
    {
        return view('admin.users.users', [
            'users' => user::orderBy('id', 'asc')->paginate(3)
        ]);
    }
}
