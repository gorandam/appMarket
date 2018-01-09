<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManageController extends Controller
{

    // Here is our method to redirct to /manage/dashboard URI
    public function index()
    {
        return redirect()->route('manage.dashboard');
    }


    public function dashboard()
    {
        return view('manage.dashboard');
    }
}
