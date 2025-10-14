<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{

    protected $fillable = [
        'name',
        'location',
        'province',
        'distric',
        'city',
        'content',
    ];

    public function province()
    {
        return $this->belongsTo(Province::class, 'province');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'distric'); // keep field name same as DB column
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city');
    }

    public function images()
    {
        return $this->hasMany(DestinationHasImages::class, 'destination_id');
    }

    public function firstImage()
    {
        return $this->hasOne(DestinationHasImages::class, 'destination_id')->orderBy('id', 'asc');
    }


    public $timestamps = false;

    use HasFactory;
}
