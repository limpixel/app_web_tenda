<?php

namespace App\Http\Controllers;


use App\Models\Dashboard\About\AboutTeamsSection;
use Illuminate\Http\Request;

class AboutTeamSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $team = AboutTeamsSection::all();
        return view('about.about_team_section.home', compact('team'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('about.about_team_section.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'job_title' => 'required|string',
            'about_person' => 'required|string',
            'linkedin_person' => 'required|string',
            'instagram_person' => 'required|string',
            'image_person' => 'required|image|max:5048'
        ]);

        $input = $request->all();

        if ($image = $request->file('image_person')) {
            $destinationPath = 'images/about/';
            $fileName = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $fileName);
            $input['image_person'] = $fileName;
        }

        AboutTeamsSection::create($input);
        notify('success', 'This Section has been Created');
        return redirect()->route('dashboard.about_team.index');
    }

    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $teams = AboutTeamsSection::findOrFail($id);
        return view('about.about_team_section.edit', compact('teams'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'job_title' => 'required|string',
            'about_person' => 'required|string',
            'linkedin_person' => 'required|string',
            'instagram_person' => 'required|string',
            'image_person' => 'required|image|max:5048'
        ]);

        $teams = AboutTeamsSection::findOrFail($id);
        $input = $request->all();

        if ($image = $request->file('image_person')) {
            $destinationPath = 'images/about/';
            $fileName = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $fileName);

            if ($teams->image_person && file_exists($destinationPath . $teams->image_person)) {
                unlink($destinationPath . $teams->image_person);
            }

            $input['image_person'] = $fileName;
        }

        $teams->update($input);

        AboutTeamsSection::create($input);
        notify('success', 'This Section has been Edited');
        return redirect()->route('dashboard.about_team.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $teams = AboutTeamsSection::findOrFail($id);
        $destinationPath = 'images/about/';

        if ($teams->image_person && file_exists($destinationPath . $teams->image_person)) {
            unlink($destinationPath . $teams->image_person);
        }

        $teams->delete();
        notify('success', 'This Teams has been deleted');
        return redirect()->route('dashboard.about_team.index');
    }
}
