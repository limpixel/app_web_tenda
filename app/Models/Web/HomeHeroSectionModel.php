<?php

namespace App\Models\Web;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeHeroSectionModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'head_text',
        'title_text',
        'description',
        'image'
    ];
}
