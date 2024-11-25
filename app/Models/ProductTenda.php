<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTenda extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_product',
        'name_produdct',
        'ukuran',
        'masa_waktu',
        'harga',
        'satuan',
        'tipe',
    ];
}
