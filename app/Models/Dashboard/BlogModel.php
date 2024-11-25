<?php

namespace App\Models\Dashboard;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'judul_blog',
        'desc_blog',
        'content',
        'user_id'
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }
}
