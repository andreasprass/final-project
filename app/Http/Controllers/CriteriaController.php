<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Scoring;
use App\Models\Criteria;
use Illuminate\Http\Request;

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
}
