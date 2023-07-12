<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KandidatPenilaian extends Model
{
    use HasFactory;

    public function kandidats(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    

    protected $fillable = [
        'id',
        'user_id',
        'id_rekap',
    ];
}
