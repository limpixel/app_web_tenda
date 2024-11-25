<?php

namespace App\Http\Controllers\Frontend\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FEBlogController extends Controller
{
    public function index()
    {
        return view('web.blog');
    }
}
