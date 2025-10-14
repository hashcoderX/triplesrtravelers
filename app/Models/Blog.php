<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    
    protected $fillable = [
        'topic',
        'content',
        'date_time',
        'views',
        'thumb_img',
        
    ];

    public $timestamps = false;
    
    use HasFactory;
}
