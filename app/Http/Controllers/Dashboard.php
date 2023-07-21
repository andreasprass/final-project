<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rekap;
use App\Models\Ranking;
use App\Models\Scoring;
use App\Models\Criteria;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index(){
        $rekaps = Rekap::all();
        $user = User::where('status', 1)->get();
        $kriteria = Criteria::all();


        foreach($kriteria as $kriteria){
           $krit = Criteria::pluck('weight')->toArray();
           $label = Criteria::pluck('criteria')->toArray();
        }

        foreach($rekaps as $rekap){
            $data[] = Scoring::where('id_rekap',$rekap->id)->count();
            $label_data = Scoring::get('id_rekap')->unique('id_rekap');
        }

        foreach($label_data as $label_data){
            $lab_data[] = $label_data->rekap->nama_rekap;
        }

        return view('index', [
            'user_count' => $user->count(),
            'rekap_count' => $rekaps->count(),
            'kriteria_count' => $kriteria->count(),
            'rankings' => Ranking::orderBy('id_rekap')->orderBy('nilai_ranking','desc')->get(),
            'rekapitulasi' => Rekap::all(),
            'krit' => $krit,
            'label' => $label,
            'jumlah_nilai' => $data,
            'label_data' => $lab_data,
        ]);
    }

    public function profile(){
        return view('profile/myprofile');
    }

}
