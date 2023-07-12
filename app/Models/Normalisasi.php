<?php

namespace App\Models;

use App\Models\KandidatPenilaian;
use App\Models\KriteriaPenilaian;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Normalisasi extends Model
{
    use HasFactory;

    public function kriteriaPenilaian(){
        return $this->belongsTo(KriteriaPenilaian::class,'kriteria_penilaian','id');
    }

    public function kriterias(){
        return $this->belongsTo(Criteria::class,'criteria_id','id');
    }

    public function kandidatPenilaian(){
        return $this->belongsTo(KandidatPenilaian::class,'kandidat_penilaian','id');
    }

    protected $fillable = [
        'id',
        'kandidat_penilaian',
        'nilai_normalisasi',
        'kriteria_penilaian',
        'id_rekap',
    ];
}
