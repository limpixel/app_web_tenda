<?php

namespace App\Http\Controllers\Frontend\Web;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Frontend\Dashboard\About\AboutHeroSection as AboutAboutHeroSection;
use App\Models\Dashboard\About\AboutCompanySection;
use App\Models\Dashboard\About\AboutHeroSection;
use App\Models\Dashboard\About\AboutTestimonySection;
use Illuminate\Http\Request;

class FEAboutController extends Controller
{
    public function index(){
        $aboutCompanySection = AboutCompanySection::all();
        $aboutHeroSection = AboutHeroSection::all();
        $aboutTestimonySection = AboutTestimonySection::take(3)->get();
        return view('web.about', compact('aboutCompanySection', 'aboutHeroSection', 'aboutTestimonySection'));
        
    }
}
