<?php

namespace App\Http\Controllers\Frontend\Web;

use App\Http\Controllers\Controller;
use App\Models\ProdukWebsite;
use Illuminate\Http\Request;

class FEContactController extends Controller
{
    public function index()
    {
        $product = ProdukWebsite::all();
        return view('web.contact', compact('product'));
    }
}
