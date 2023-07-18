<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Scoring;
use App\Models\Criteria;
use App\Models\Normalisasi;
use Illuminate\Http\Request;
use App\Models\KriteriaPenilaian;

class CriteriaController extends Controller
{
    public function index(){
        return view('criterias',[
            'criteria_data' => Criteria::all(),
        ]);
    }
    public function create(){
        return view('criterias_add');
    }

    public function store(Request $req){
        $data = $req->all();
        Criteria::create($data);
        return redirect()->route('criterias');
    }

    public function edit($criteria_id){
        return view('criterias_edit',[
            'criteria' => Criteria::find($criteria_id),
        ]);
    }

    public function update($criteria_id, Request $req ){
        $data = $req->except(['_token','_method']);
        Criteria::where('id',$criteria_id)->update($data);
        return redirect()->route('criterias');
    }

    public function delete($criteria_id){
        $krit_pen = KriteriaPenilaian::where('criteria_id',$criteria_id);
        if($krit_pen->exists() == true){ 
            $kriteria = KriteriaPenilaian::where('criteria_id',$criteria_id)->first();
            $scoring = Scoring::where('kriteria_penilaian',$kriteria->id);  
            $norm = Normalisasi::where('kriteria_penilaian',$kriteria->id);
            if($scoring->exists() == true){
                $scoring->delete();
                if($norm->exists() == true){
                    $norm->delete();
                }
            }elseif($norm->exists() == true){
                $norm->delete();
            }
            $krit_pen->delete();
            Criteria::where('id',$criteria_id)->delete();
        }else{
            Criteria::where('id',$criteria_id)->delete();
        }
        return redirect()->route('criterias');

    }


}
