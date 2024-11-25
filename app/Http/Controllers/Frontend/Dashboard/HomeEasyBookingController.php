<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Web\HomeEasyBookingModel;
use Illuminate\Http\Request;

class HomeEasyBookingController extends Controller
{
    public function index(){
        return view('home.home_easy_booking.index');
    }

    public function create(){
        return view('home.home_easy_booking.create');
    }

    public function store(Request $request){
        $request->validate([
            'head_text' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048'
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/home/home_easy_booking/';
            $heroImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $heroImage);
            $input['image'] = "$heroImage";
        }

        HomeEasyBookingModel::create($input);

        notify('success', 'This Section Has been Created');
        return redirect()->route('dashboard.home-easy-book-section.index');
    }

    public function edit($id) {
        $homeEasyBooking = HomeEasyBookingModel::findOrFail($id);
        return view('home.home_easy_booking.edit', compact('homeEasyBooking'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'head_text' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048'
        ]);

        $homeEasyBooking = HomeEasyBookingModel::findOrFail($id);
        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/home/home_easy_booking/';
            $heroImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $heroImage);

            // Hapus gambar lama jika ada
            if ($homeEasyBooking->image && file_exists($destinationPath . $homeEasyBooking->image)) {
                unlink($destinationPath . $homeEasyBooking->image);
            }

            $input['image'] = "$heroImage";
        }

        $homeEasyBooking->update($input);

        notify('success', 'This Section Has been Updated');
        return redirect()->route('dashboard.home-easy-book-section.index');
    }

    public function destroy($id) {
        $homeEasyBooking = HomeEasyBookingModel::findOrFail($id);

        // Hapus gambar jika ada
        $destinationPath = 'images/home/home_easy_booking/';
        if ($homeEasyBooking->image && file_exists($destinationPath . $homeEasyBooking->image)) {
            unlink($destinationPath . $homeEasyBooking->image);
        }

        $homeEasyBooking->delete();

        notify('success', 'This Section Has been Deleted');
        return redirect()->route('dashboard.home-easy-book-section.index');
    }
}
