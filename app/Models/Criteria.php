<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    use HasFactory;

    protected $fillable = [
        'criteria',
        'min_max',
        'weight'
    ];

    /**
        * The attributes that should be hidden for serialization.
        *
        * @var array<int, string>
        */
    protected $hidden = [

    ];

    /**
        * The attributes that should be cast.
        *
        * @var array<string, string>
        */
    protected $casts = [

    ];
}
