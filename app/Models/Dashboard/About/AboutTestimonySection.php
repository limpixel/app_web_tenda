<?php

namespace App\Models\Dashboard\About;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutTestimonySection extends Model
{
    use HasFactory;
    protected $fillable = [
        'testimony_text',
        'name_person'
    ];
}
