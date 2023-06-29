<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scoring extends Model
{
    use HasFactory;

    protected $table = 'scorings';

    public function users(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function criteria(){
        return $this->belongsTo(Criteria::class,'criteria_id','id');
    }
    public function rekap(){
        return $this->belongsTo(Rekap::class,'id_rekap','id');
    }
    
    protected $fillable = [
        'id',
        'kandidat_penilaian',
        'kriteria_penilaian',
        'id_rekap',

    ];

    protected $guarded = [];

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
