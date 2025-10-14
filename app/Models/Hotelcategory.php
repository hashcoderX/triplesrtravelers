<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotelcategory extends Model
{
    
    protected $fillable = [
        'category',
        'content',
        'cover_img',
    ];

    public $timestamps = false;
    
    use HasFactory;
}
