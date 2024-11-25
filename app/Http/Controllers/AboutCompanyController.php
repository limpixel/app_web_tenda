<?php

namespace App\Http\Controllers;

use App\Models\AboutCompany;
use App\Models\Web\AboutCompanySection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;  // Add this import

class AboutCompanyController extends Controller
{
    // Display a listing of the About Company entries
    public function index()
    {
        $aboutCompanies = AboutCompanySection::all();
        return view('about_companies.index', compact('aboutCompanies'));
    }

    // Show the form for creating a new About Company entry
    public function create()
    {
        return view('about_companies.create');
    }

    // Store a newly created About Company entry in storage
    public function store(Request $request)
    {
        $request->validate([
            'head_text' => 'required|string|max:255',
            'description_text' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $aboutCompany = new AboutCompanySection();
        $aboutCompany->head_text = $request->head_text;
        $aboutCompany->description_text = $request->description_text;

        // Handle image upload if exists
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $aboutCompany->image = $imagePath;
        }

        $aboutCompany->save();

        return redirect()->route('about_companies.index')->with('success', 'About Company entry created successfully');
    }

    // Display the specified About Company entry
    public function show(AboutCompanySection $aboutCompany)
    {
        return view('about_companies.show', compact('aboutCompany'));
    }

    // Show the form for editing the specified About Company entry
    public function edit(AboutCompanySection $aboutCompany)
    {
        return view('about_companies.edit', compact('aboutCompany'));
    }

    // Update the specified About Company entry in storage
    public function update(Request $request, AboutCompanySection $aboutCompany)
    {
        $request->validate([
            'head_text' => 'required|string|max:255',
            'description_text' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $aboutCompany->head_text = $request->head_text;
        $aboutCompany->description_text = $request->description_text;

        // Handle image update if exists
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($aboutCompany->image) {
                Storage::delete('public/' . $aboutCompany->image);  // Now this works after importing Storage
            }
            $imagePath = $request->file('image')->store('images', 'public');
            $aboutCompany->image = $imagePath;
        }

        $aboutCompany->save();

        return redirect()->route('about_companies.index')->with('success', 'About Company entry updated successfully');
    }

    // Remove the specified About Company entry from storage
    public function destroy(AboutCompanySection $aboutCompany)
    {
        // Delete the image from storage if it exists
        if ($aboutCompany->image) {
            Storage::delete('public/' . $aboutCompany->image);  // Now this works after importing Storage
        }

        $aboutCompany->delete();

        return redirect()->route('about_companies.index')->with('success', 'About Company entry deleted successfully');
    }
}
