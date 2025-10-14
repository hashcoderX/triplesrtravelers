<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{

    protected $fillable = [
        'name',
        'type',
        'start_date',
        'end_date',
        'content',
        'max_passenger',
        'per_adult_price',
        'per_child_price',
        'pickup',
        'drop_up',
        'status',
    ];

    public $timestamps = false;

    use HasFactory;

    // Relation to images
    public function images()
    {
        return $this->hasMany(TripHasImages::class, 'trip_id');
    }

    // Get first image only
    public function firstImage()
    {
        return $this->hasOne(TripHasImages::class, 'trip_id')->orderBy('id', 'asc');
    }
}
