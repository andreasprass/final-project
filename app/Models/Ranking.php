<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ranking extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'kandidat_penilaian',
        'nilai_ranking',
        'kriteria_penilaian',
        'id_rekap',
    ];
}
