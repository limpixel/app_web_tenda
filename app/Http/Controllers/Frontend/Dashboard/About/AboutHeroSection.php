<?php

namespace App\Http\Controllers\Frontend\Dashboard\About;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\About\AboutHeroSection as AboutAboutHeroSection;
use Illuminate\Http\Request;

class AboutHeroSection extends Controller
{
    public function index()
    {
        $aboutHeroSection = AboutAboutHeroSection::all();
        return view('about.about_hero_section.home', compact('aboutHeroSection'));
    }

    public function create()
    {
        return view('about.about_hero_section.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'head_text' => 'required|string|max:255',
            'about' => 'required|string',
        ]);

        AboutAboutHeroSection::create($request->all());

        notify()->success('About Hero Section created successfully!');
        return redirect()->route('dashboard.about_hero_section.index');
    }

    public function edit($id)
    {
        $aboutHeroSection = AboutAboutHeroSection::findOrFail($id);
        return view('about.about_hero_section.edit', compact('aboutHeroSection'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'head_text' => 'required|string|max:255',
            'about' => 'required|string',
        ]);

        $aboutHeroSection = AboutAboutHeroSection::findOrFail($id);
        $aboutHeroSection->update($request->all());

        notify()->success('About Hero Section updated successfully!');
        return redirect()->route('dashboard.about_hero_section.index');
    }

    public function destroy($id)
    {
        $aboutHeroSection = AboutAboutHeroSection::findOrFail($id);
        $aboutHeroSection->delete();

        notify()->success('About Hero Section deleted successfully!');
        return redirect()->route('dashboard.about_hero_section.index');
    }
}
