<?php

namespace App\Models;

use App\Models\Criteria;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KriteriaPenilaian extends Model
{
    use HasFactory;

    public function kriterias(){
        return $this->belongsTo(Criteria::class,'criteria_id','id');
    }

    protected $fillable = [
        'id',
        'criteria_id',
        'id_rekap',
    ];
}
