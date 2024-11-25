<?php

namespace App\Http\Controllers\Frontend\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ProdukWebsite;
use Illuminate\Http\Request;

class ProductWebsiteController extends Controller
{
    public function index()
    {
        $products = ProdukWebsite::all();
        return view('dashboard.product.index', compact('products'));
    }

    public function create()
    {
        return view('dashboard.product.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required | string',
            'harga' => 'required | string',
            'tipe_produk' => 'required | string',
            'ukuran' => 'required | string',
            'waktu_harian' => 'required | string',
            'image_produk' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/produk/';
            $heroImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $heroImage);
            $input['image_produk'] = "$heroImage";
        }

        ProdukWebsite::create($input);
        // notify('success', 'Product Has Been Created');
        return redirect()->route('dashboard.product_web.index');
    }

    public function edit($id)
    {
        // Ambil data produk berdasarkan ID
        $product = ProdukWebsite::findOrFail($id);

        // Kembalikan view edit dengan membawa data produk
        return view('dashboard.product.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama_produk' => 'required|string',
            'harga' => 'required|string',
            'tipe_produk' => 'required|string',
            'ukuran' => 'required|string',
            'waktu_harian' => 'required|string',
            'image_produk' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
        ]);

        // Cari produk berdasarkan ID
        $product = ProdukWebsite::findOrFail($id);

        // Ambil semua input kecuali gambar
        $input = $request->all();

        // Jika ada gambar yang diunggah
        if ($image = $request->file('image_produk')) {
            // Hapus gambar lama
            if ($product->image_produk && file_exists(public_path('images/produk/' . $product->image_produk))) {
                unlink(public_path('images/produk/' . $product->image_produk));
            }

            // Simpan gambar baru
            $destinationPath = 'images/produk';
            $heroImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $heroImage);
            $input['image_produk'] = "$heroImage";
        }

        // Perbarui data produk
        $product->update($input);

        // Notifikasi dan redirect
        // notify('success', 'Product Has Been Updated');
        return redirect()->route('dashboard.product_web.index');
    }

    public function destroy($id)
    {
        // Cari produk berdasarkan ID
        $product = ProdukWebsite::findOrFail($id);

        // Hapus gambar produk jika ada
        if ($product->image_produk && file_exists(public_path('images/produk/' . $product->image_produk))) {
            unlink(public_path('images/produk/' . $product->image_produk));
        }

        // Hapus produk dari database
        $product->delete();

        // Notifikasi dan redirect
        // notify('success', 'Product Has Been Deleted');
        return redirect()->route('dashboard.product_web.index');
    }

}
