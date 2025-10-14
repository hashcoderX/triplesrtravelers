<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TripHasImages extends Model
{

    protected $fillable = [
        'file_url',
        'trip_id',
    ];

    public $timestamps = false;

    use HasFactory;

    public function trip()
    {
        return $this->belongsTo(Trip::class, 'trip_id');
    }
}
