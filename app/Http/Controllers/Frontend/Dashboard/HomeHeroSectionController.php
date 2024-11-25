<?php

namespace App\Http\Controllers\Frontend\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Web\HomeHeroSectionModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HomeHeroSectionController extends Controller
{
    public function index()
    {
        $heroSections = HomeHeroSectionModel::all();
        return view('home.home_hero_section.index', compact('heroSections'));
    }


    public function create()
    {
        return view('home.home_hero_section.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'head_text' => 'required|string',
            'title_text' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/home/home_hero_section/';
            $heroImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $heroImage);
            $input['image'] = "$heroImage";
        }

        HomeHeroSectionModel::create($input);

        return redirect()->route('dashboard.home-hero-section.index')->with('success', 'Hero section created successfully');
    }

    public function edit($id)
    {
        $heroSection = HomeHeroSectionModel::findOrFail($id);
        return view('home.home_hero_section.edit', compact('heroSection'));
    }



    public function update(Request $request, $id)
    {
        $request->validate([
            'head_text' => 'required|string',
            'title_text' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
        ]);

        Log::info('Request Input:', $request->all());

        $section = HomeHeroSectionModel::findOrFail($id);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/home/home_hero_section/';
            $heroImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $heroImage);

            // Hapus gambar lama jika ada
            if ($section->image && file_exists($destinationPath . $section->image)) {
                unlink($destinationPath . $section->image);
            }

            $input['image'] = $heroImage;
        }

        $section->update($input);



        Log::info('Updated Section:', $section->toArray());

        return redirect()->route('dashboard.home-hero-section.index')->with('success', 'Hero section updated successfully');
    }



    public function destroy($id)
    {
        $heroSection = HomeHeroSectionModel::findOrFail($id);
        $destinationPath = 'images/home/home_hero_section/';

        if ($heroSection->image && file_exists($destinationPath . $heroSection->image)) {
            unlink($destinationPath . $heroSection->image);
        }

        $heroSection->delete();

        notify('success', 'Home Hero Section Has beed Deleted');

        return redirect()->route('dashboard.home_hero_section.index');
    }

}
