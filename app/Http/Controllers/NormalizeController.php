<?php

namespace App\Http\Controllers;

use App\Models\Scoring;
use App\Models\Criteria;
use Illuminate\Http\Request;

class NormalizeController extends Controller
{
   public function index(){
        $criteria_table = Criteria::all();
        $records = Scoring::orderBy('user_id')->orderBy('criteria_id')->get();

        //generate two-dimensional matrix in here
        // $score_matrix = [];
        // foreach($records as $data){
        //     $user = $data->user_id;
        //     $crit = $data->criteria_id;
        //     $score = $data->score;

        //     $score_matrix[$user][$crit] = $score;
        // }

        // $score_matrix[$user][$crit];

        // return view('normalize', [
        //     'data' => $score_matrix,
        // ]);

        foreach($criteria_table as $crit){
            $weight_array[] = $crit->weight;
        }
        $weight_sum = array_sum($weight_array);

        $weight_array[] = $criteria_table;
        for($i=0;$i<count($criteria_table);$i++){
            $weight[] = $weight_array[$i]/$weight_sum;
        }
        dd($weight_sum);

   }
}
