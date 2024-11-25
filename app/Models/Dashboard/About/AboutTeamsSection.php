<?php

namespace App\Models\Dashboard\About;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutTeamsSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'job_title',
        'about_person',
        'linkedin_person',
        'instagram_person',
        'image_person',
    ];
}
