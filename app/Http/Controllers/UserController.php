<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $nonAdminUsers = User::where('is_admin', '0')->with(['profile'])->paginate(10);
        return view('users.index', compact('nonAdminUsers'));
    }
}
