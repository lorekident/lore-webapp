<?php

namespace App\Http\Controllers;

use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->is_admin) {
            $nonAdminUsers = User::where('is_admin', '0')->with(['profile'])->paginate(10);
            return view('users.index', compact('nonAdminUsers'));
        }else{
            return view('home', ['profile' => auth()->user()->profile]);
        }
    }
}
