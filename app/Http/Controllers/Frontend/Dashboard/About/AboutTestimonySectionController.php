<?php

namespace App\Http\Controllers\Frontend\Dashboard\About;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\About\AboutTestimonySection;
use Illuminate\Http\Request;

class AboutTestimonySectionController extends Controller
{
    public function index(){
        $aboutTestimony = AboutTestimonySection::all();
        return view('about.about_testimony_section.home', compact('aboutTestimony'));
    }

    public function create(){
        return view('about.about_testimony_section.create');
    }

    public function store(Request $request){
        $request->validate([
            'testimony_text' => 'required|string',
             'name_person' => 'required|string|max:56'
        ]);

        AboutTestimonySection::create($request->all());

        notify()->success('About Tesstimony Has Been Created');

        return redirect()->route('dashboard.about_testimoni_section.index');

    }

    public function edit($id){
        $aboutTestimony = AboutTestimonySection::findOrFail($id);
        return view('about.about_testimony_section.edit', compact('aboutTestimony'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'testimony_text' => 'required|string',
             'name_person' => 'required|string|max:56'
        ]);

        $aboutTestimony = AboutTestimonySection::findOrFail($id);
        $aboutTestimony->update($request->all());
        notify('success', 'About Testimony Has been Updated');
        return redirect()->route('dashboard.about_testimoni_section.index');
    }

    public function destroy($id){
        $aboutTestimony = AboutTestimonySection::findOrFail($id);
        $aboutTestimony->delete();

        notify('success', 'About Testimony Has been deleted');
        return redirect()->route('dashboard.about_testimoni_section.index');
    }
}


