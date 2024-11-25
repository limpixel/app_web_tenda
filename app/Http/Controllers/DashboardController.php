<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Untuk public function home section 
    public function home_dashboard(){
        return view('home.home_dashboard');
    }

    // Untuk public function about section 
}
