<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelHasImages extends Model
{
    
    protected $fillable = [
        'url',
        'hotel_id',
        'date',
    ];

    public $timestamps = false;
    
    use HasFactory;
}
