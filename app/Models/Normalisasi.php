<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Normalisasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'kandidat_penilaian',
        'nilai_normalisasi',
        'kriteria_penilaian',
        'id_rekap',
    ];
}
