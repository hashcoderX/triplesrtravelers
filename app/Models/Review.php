<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    
    protected $fillable = [
        'note',
        'author',
        'date',
        'rating_level',
        'status',
    ];

    public $timestamps = false;
    
    use HasFactory;
}
