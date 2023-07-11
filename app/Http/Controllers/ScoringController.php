<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rekap;
use App\Models\Ranking;
use App\Models\Scoring;
use App\Models\Criteria;
use App\Models\Normalisasi;
use Illuminate\Http\Request;
use App\Models\KandidatPenilaian;
use App\Models\KriteriaPenilaian;

class ScoringController extends Controller
{
    //New
    public function get_rekap(){
        return view('penilaian',[
            'rekapitulasi' => Rekap::all(),
        ]);
    }

    public function get_add_rekap(){
        return view('penilaian_add');
    }

    public function add_rekap(Request $request){
        // dd($request->nama_rekap);
        $data = $request->all();
        Rekap::create($data);
        return redirect()->route('get_rekap')->with('success', 'The data has been added');
    }

    public function get_detail_penilaian($id){
        $dataRekap = Rekap::find($id);
        

        $cekScoringUser = KandidatPenilaian::where('id_rekap',$id)->get('user_id');
        $cekScoringCriteria = KriteriaPenilaian::where('id_rekap',$id)->get('criteria_id');

        //whereNotIn
        $dataKandidat = User::whereNotIn('id',$cekScoringUser)->get(); 
        $dataKriteria = Criteria::whereNotIn('id',$cekScoringCriteria)->get(); 

        //data semua nilai
        $dataNilai = Scoring::where('id_rekap', $id)->get(); 
        $dataIsiNilai = $dataNilai->where('kandidat_penilaian');
        
        //whereIn
        $daftarKandidat = KandidatPenilaian::where('id_rekap',$id)->get();
        $daftarKriteria = KriteriaPenilaian::where('id_rekap',$id)->get();
        

        return view('penilaian_detail',[  
            'rekap' => $dataRekap,

            'tambahKandidat' => $dataKandidat,
            'tambahKriteria' => $dataKriteria,

            'daftarKriteria' => $daftarKriteria,
            'daftarKandidat' => $daftarKandidat,
            'nilai' => $dataNilai,
            'dataIsiNilai' => $dataIsiNilai,
        ]);

    }

    public function add_kriteria(Request $request, $id){
        $data = $request->all();
        $id_rekap = $id;
        $a = KandidatPenilaian::where('id_rekap',$id_rekap)->get();
        $user = User::get();

        if(count($user) == 0){
            return redirect()->route('get_detail_penilaian',['id'=> request()->route('id')])->with('fail', 'Daftar Atau Buat User Baru');
        }elseif(count($a) > 0){
            $simpanKriterita = [
                'criteria_id' => $data['criteria_id'],
                'id_rekap' => $id_rekap,
            ];
            KriteriaPenilaian::create($simpanKriterita);
            $ambil = KriteriaPenilaian::where('criteria_id', $data['criteria_id'])->where('id_rekap',$id_rekap)->first('id');
            for ($i = 0; $i < count($a); $i++) {
                $simpanPenilaian = [
                    'kandidat_penilaian' => $a[$i]->id,
                    'kriteria_penilaian' => $ambil->id,
                    'id_rekap' => $id_rekap,
                ];
                Scoring::create($simpanPenilaian);
            }
            return redirect()->route('get_detail_penilaian',['id'=> request()->route('id')])->with('success', 'Data Telah Ditambahkan');
        }else{
            $simpanKriterita = [
                'criteria_id' => $data['criteria_id'],
                'id_rekap' => $id_rekap,
            ];
            KriteriaPenilaian::create($simpanKriterita);
            return redirect()->route('get_detail_penilaian',['id'=> request()->route('id')])->with('success', 'Data Telah Ditambahkan');
        }
    }

    public function delete_kriteria_penilaian($id, $id_rekap){
        Scoring::where('kriteria_penilaian',$id)->delete();
        KriteriaPenilaian::where('id',$id)->delete();
        return redirect()->route('get_detail_penilaian',['id' => $id_rekap])->with('success', 'Kriteria Telah Dihapus');
    }

    public function add_kandidat(Request $request, $id){
        $data = $request->all();
        $id_rekap = $id;
        $a = KriteriaPenilaian::where('id_rekap', $id_rekap)->get();
        $kriteria = Criteria::get();

        if(count($kriteria) == 0){
            return redirect()->route('get_detail_penilaian',['id'=> request()->route('id')])->with('fail', 'Buat Kriteria Pada Halaman Kriteria');
        }elseif (count($a) > 0) { 
            // return redirect()->route('get_detail_penilaian',['id'=> request()->route('id')])->with('fail', 'Pilih Kriteria');
            $simpanKandidat = [
                'user_id' => $data['user_id'],
                'id_rekap' => $id_rekap,
            ];
            KandidatPenilaian::create($simpanKandidat);

            $ambil = KandidatPenilaian::where('user_id',$data['user_id'])->where('id_rekap',$id_rekap)->first('id');
            for ($i = 0; $i < count($a); $i++) {
            
                $simpanPenilaian = [
                    'kandidat_penilaian' => $ambil->id,
                    'kriteria_penilaian' => $a[$i]->id,
                    'id_rekap' => $id_rekap,
                ]; 
                Scoring::create($simpanPenilaian);
            }
            return redirect()->route('get_detail_penilaian',['id'=> request()->route('id')])->with('success', 'Data Telah Ditambahkan');
        }else{
            $simpanKandidat = [
                'user_id' => $data['user_id'],
                'id_rekap' => $id_rekap,
            ];
            KandidatPenilaian::create($simpanKandidat);
            return redirect()->route('get_detail_penilaian',['id'=> request()->route('id')])->with('success', 'Data Telah Ditambahkan');
        }
    }

    public function delete_kandidat_penilaian($id, $id_rekap) {
        Scoring::where('kandidat_penilaian',$id)->delete();
        KandidatPenilaian::where('id',$id)->delete();
        return redirect()->route('get_detail_penilaian',['id' => $id_rekap])->with('success', 'Kandidat Telah Dihapus');
    }

    public function get_isi_nilai(Request $req, $id, $id_rekap){
        $data = Scoring::where('id_rekap',$id_rekap)->where('kandidat_penilaian', $id)->get();
        $kandidat = KandidatPenilaian::where('id',$id)->first();
        return view('isi_nilai',[
           'id_rekap' => $id_rekap,
           'kandidat' => $kandidat, 
           'data' => $data,

        ]);
    }

    public function isi_nilai(Request $req, $id_rekap){
        $kandidat = $req->all();
        $kriteria = $req->kriteria_penilaian;
        for($i=0;$i<count($kriteria);$i++){
            $kriteria_data = $req->kriteria_penilaian[$i];
            $datasave = [
                'kandidat_penilaian' => $req->kandidat_penilaian[$i],
                'kriteria_penilaian' => $req->kriteria_penilaian[$i],
                'nilai' => $req->nilai[$i],
                'id_rekap' => $id_rekap,
                'id' => $req->id[$i],
            ];

            Scoring::where('id',$req->id[$i])->where('kandidat_penilaian',$req->kandidat_penilaian[$i])
            ->where('kriteria_penilaian',$req->kriteria_penilaian[$i])
            ->where('id_rekap',$id_rekap)->update($datasave);
        }
        return redirect()->route('get_detail_penilaian',['id' => $id_rekap])->with('success', 'Nilai Telah Diupdate');
    }

    public function hitung_nilai($id_rekap){
        $dataNilai = Scoring::where('id_rekap', $id_rekap)->get();
        $dataKriteria = KriteriaPenilaian::where('id_rekap',$id_rekap)->get();
        $dataKandidat = KandidatPenilaian::where('id_rekap',$id_rekap)->get();
        $dataRanking = Ranking::where('id_rekap',$id_rekap)->get();

        //Step 1 Calculate the normalized values for each criteria
        foreach($dataNilai as $row){
            $cek = Normalisasi::where('id_rekap',$id_rekap)->where('kandidat_penilaian',$row->kandidat_penilaian)->where('kriteria_penilaian',$row->kriteria_penilaian)->exists();
            
            if($cek == true){
                //Find the weight current criteria
                $weight = $dataKriteria->where('id',$row->kriteria_penilaian)->first()->kriterias->weight;

                // Perform normalization based on the minMax attribute of the criteria
                if($dataKriteria->where('id',$row->kriteria_penilaian)->first()->kriterias->minMax == 'max'){
                    $maxValue = $dataNilai->where('kriteria_penilaian',$row->kriteria_penilaian)->max('nilai');
                    $normalizedValue = $row->nilai / $maxValue;
                }else{
                    $minValue = $dataNilai->where('kriteria_penilaian',$row->kriteria_penilaian)->min('nilai');
                    if($minValue == 0 AND $row->nilai == 0){
                        $normalizedValue = 1 / 1;
                    }elseif($minValue == 0){
                        $normalizedValue = 1 / $row->nilai;
                    }else{
                        $normalizedValue = $minValue / $row->nilai;
                    }
                }

                //Save the normalized value into 'normalisasi' table
                $normalisasi = [
                    'nilai_normalisasi' => $normalizedValue,
                ];
                Normalisasi::where('id_rekap',$id_rekap)->where('kandidat_penilaian',$row->kandidat_penilaian)->where('kriteria_penilaian',$row->kriteria_penilaian)->update($normalisasi);

            }else{

                //Find the weight current criteria
                $weight = $dataKriteria->where('id',$row->kriteria_penilaian)->first()->kriterias->weight;

                // Perform normalization based on the minMax attribute of the criteria
                if($dataKriteria->where('id',$row->kriteria_penilaian)->first()->kriterias->minMax == 'max'){
                    $maxValue = $dataNilai->where('kriteria_penilaian',$row->kriteria_penilaian)->max('nilai');
                    $normalizedValue = $row->nilai / $maxValue;
                }else{
                    $minValue = $dataNilai->where('kriteria_penilaian',$row->kriteria_penilaian)->min('nilai');
                    if($minValue == 0 AND $row->nilai == 0){
                        $normalizedValue = 1 / 1;
                    }elseif($minValue == 0){
                        $normalizedValue = 1 / $row->nilai;
                    }else{
                        $normalizedValue = $minValue / $row->nilai;
                    }
                }

                //Save the normalized value into 'normalisasi' table
                $normalisasi = [
                    'kandidat_penilaian' => $row->kandidat_penilaian,
                    'nilai_normalisasi' => $normalizedValue,
                    'kriteria_penilaian' => $row->kriteria_penilaian,
                    'id_rekap' => $row->id_rekap,
                ];
                Normalisasi::create($normalisasi);
            }
            
        }

        // //Step 2 Calculate the total score for each candidate
        // $candidates = $dataKandidat->pluck('id')->unique();
        // foreach($candidates as $candidate){

        //     //Retrive the normalized values for the current candidate
        //     $normalizedValue = Normalisasi::where('kandidat_penilaian',$candidate)->get();

        //     //Calculate the total score by summing the weighted normalized values
        //     foreach($normalizedValue as $normalizedValue){
        //         $weight = $dataKriteria->where('id', $normalizedValue->kriteria_penilaian)->first()->weight;
        //         $totalScore += $normalizedValue->nilai_normalisasi * $weight;
        //     }

        //     $ranking = [
        //         'kandidat_penilaian' => $candidate,
        //         'nilai_ranking' => $totalScore,
        //         'kriteria'
        //     ];
        // }

        // dd($candidates);
        return redirect()->route('get_detail_penilaian',['id' => $id_rekap])->with('success', 'Penghitungan Selesai');
        // }
    }
   
}


