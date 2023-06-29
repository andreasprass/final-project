<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KandidatPenilaian extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'id_rekap',
    ];
}
