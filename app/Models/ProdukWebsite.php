<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukWebsite extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_produk',
        'harga',
        'tipe_produk',
        'ukuran',
        'waktu_harian',
        'image_produk',
    ];
}
