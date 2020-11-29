<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Profile extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth');
    }

    public function dashboard(Request $request)
    {
        return view('dashboard');
    }
}
