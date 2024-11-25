<?php

namespace App\Models\Dashboard\About;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutHeroSection extends Model
{
    use HasFactory;
    protected $fillable = [
        'head_text',
        'about'
    ];
}
