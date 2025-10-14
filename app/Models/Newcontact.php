<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newcontact extends Model
{

    protected $fillable = [
        'fullname',
        'contactno',
        'email',
        'country'
    ];

    public $timestamps = false;

    use HasFactory;
}
