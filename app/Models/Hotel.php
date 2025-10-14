<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{

    protected $fillable = [
        'name',
        'type',
        'location',
        'province',
        'distric',
        'city',
        'content',
        'roomonlyprice',
        'bbprice',
        'hbprice',
        'fbprice',
        'allinclusiveprice',
        'reg_date',
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
        return $this->hasMany(HotelHasImages::class, 'hotel_id');
    }

    public function firstImage()
    {
        return $this->hasOne(HotelHasImages::class, 'hotel_id')->orderBy('id', 'asc');
    }

    public $timestamps = false;

    use HasFactory;
}
