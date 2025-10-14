<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegionHasImages extends Model
{

    protected $fillable = [
        'file_url',
        'region_id',
    ];

    public $timestamps = false;

    use HasFactory;
}
