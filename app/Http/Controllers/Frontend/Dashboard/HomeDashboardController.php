<?php

namespace App\Http\Controllers\Frontend\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeDashboardController extends Controller
{
    public function index(){
        return view('home.home_dashboard');
    }

    
}


