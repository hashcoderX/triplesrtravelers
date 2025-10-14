<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DestinationHasImages extends Model
{

    protected $fillable = [
        'url',
        'destination_id',
        'date',
    ];

    public $timestamps = false;

    use HasFactory;
}
