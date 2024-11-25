<?php

namespace App\Http\Controllers\Frontend\Dashboard\About;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\About\AboutCompanySection;
use Illuminate\Http\Request;

class AboutCompanySectionController extends Controller
{
    public function index()
    {
        $items = AboutCompanySection::paginate(10); // Mengambil data dengan pagination
        return view('about.about_company_section.home', compact('items'));
    }

    public function create()
    {
        return view('about.about_company_section.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'head_text' => 'required|string|max:255',
            'description_text' => 'required|string',
            'image_person' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
        ]);

        $input = $request->all();

        if ($image = $request->file('image_person')) {
            $destinationPath = 'images/about/';
            $fileName = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $fileName);
            $input['image_person'] = $fileName;
        }

        AboutCompanySection::create($input);
        notify('success', 'This Section Has been Created');
        return redirect()->route('dashboard.about_company_section.index');
    }

    public function edit($id)
    {
        $item = AboutCompanySection::findOrFail($id);
        return view('about.about_company_section.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'head_text' => 'required|string|max:255',
            'description_text' => 'required|string',
            'image_person' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
        ]);

        $item = AboutCompanySection::findOrFail($id);
        $input = $request->all();

        if ($image = $request->file('image_person')) {
            $destinationPath = 'images/about/';
            $fileName = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $fileName);

            if ($item->image_person && file_exists($destinationPath . $item->image_person)) {
                unlink($destinationPath . $item->image_person);
            }

            $input['image_person'] = $fileName;
        }

        $item->update($input);
        notify('success', 'This Section Has been Updated');
        return redirect()->route('dashboard.about_company_section.index');
    }

    public function destroy($id)
    {
        $item = AboutCompanySection::findOrFail($id);
        $destinationPath = 'images/about/';

        if ($item->image_person && file_exists($destinationPath . $item->image_person)) {
            unlink($destinationPath . $item->image_person);
        }

        $item->delete();
        notify('success', 'This Section Has been Deleted');
        return redirect()->route('dashboard.about_company_section.index');
    }
}
