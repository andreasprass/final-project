<?php

namespace App\Models;

use App\Models\User;
use App\Models\KandidatPenilaian;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ranking extends Model
{
    use HasFactory;

    
    public function kandidatPenilaian(){
        return $this->belongsTo(KandidatPenilaian::class,'kandidat_penilaian','id');
    }
    

    protected $fillable = [
        'id',
        'kandidat_penilaian',
        'nilai_ranking',
        'kriteria_penilaian',
        'id_rekap',
    ];
}
