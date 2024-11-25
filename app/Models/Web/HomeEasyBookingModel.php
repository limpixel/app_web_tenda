<?php

namespace App\Models\Web;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeEasyBookingModel extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'head_text',
        'description',
        'image'
    ];
}
