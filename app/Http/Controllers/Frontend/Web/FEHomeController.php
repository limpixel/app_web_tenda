<?php

namespace App\Http\Controllers\Frontend\Web;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\ProductModel;
use App\Models\Product;
use App\Models\ProdukWebsite;
use App\Models\Web\HomeEasyBookingModel;
use App\Models\Web\HomeHeroSectionModel;
use Illuminate\Http\Request;

class FEHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $heroSections = HomeHeroSectionModel::all();
        $homeProduct = ProdukWebsite::take(3)->get();
        $homeGetAll = ProdukWebsite::all();
        $HomeEasyBook = HomeEasyBookingModel::paginate(10); // Tambahkan pagination
        return view('web.home', compact('heroSections', 'HomeEasyBook', 'homeProduct', 'homeGetAll'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
