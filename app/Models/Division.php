<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;

    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */

    public function department(){
        return $this->belongsTo(Department::class,'dept_id','id');
    }

    protected $fillable = [
        'div_name',
        'dept_id',
        'description',
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
