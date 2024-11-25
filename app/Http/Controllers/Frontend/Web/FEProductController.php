<?php

namespace App\Http\Controllers\Frontend\Web;

use App\Http\Controllers\Controller;
use App\Models\ProdukWebsite;
use Illuminate\Http\Request;

class FEProductController extends Controller
{
    public function index()
    {
        $produk = ProdukWebsite::all();
        return view('web.product', compact('produk'));
    }
}
