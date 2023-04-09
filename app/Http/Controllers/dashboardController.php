<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function dashboard()
    {
        $title = 'Dahboard | SIPADI';
        return view('admin.dashboard', compact('title'));
    }
}
