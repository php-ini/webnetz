<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Profile extends Controller
{
    public function dashboard(Request $request)
    {
        return view('dashboard');
    }
}
