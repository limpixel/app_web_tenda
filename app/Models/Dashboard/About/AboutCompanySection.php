<?php

namespace App\Models\Dashboard\About;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutCompanySection extends Model
{
    use HasFactory;
    protected $fillable = [
        'head_text',
        'description_text',
        'image_person'
    ];
}
