<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logbook extends Model
{
    use HasFactory;

    public function users(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function approver(){
        return $this->belongsTo(User::class,'approver_id','id');
    }

    protected $fillable = [
        'logbook',
        'accepted',
        'user_id'

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
