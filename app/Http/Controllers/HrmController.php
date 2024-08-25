<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HrmController extends Controller
{
    public function index()
    {
        return view('hrm.index');
    }
}
