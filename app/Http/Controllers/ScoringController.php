<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Scoring;
use App\Models\Criteria;
use Illuminate\Http\Request;

class ScoringController extends Controller
{
    public function index(){

        $records = Scoring::orderBy('user_id')->orderBy('criteria_id')->get();
        //  

        // Build up a map like this from the data with the names
        // $names = [
        //     'user_id' => 'name1',
        //     'criteria_id' => 'name2',
        // ];

        $rows = [];
        $columns = [];
        foreach($records as $index => $record) {
            // Create an empty array if the key does not exist yet
            if(!isset($rows[$record->user_id])) {
                $rows[$record->user_id] = [];
            }
        
            // Add the column to the array of columns if it's not yet in there
            if(!in_array($record->criteria_id, $columns)) {
                $columns[] = $record->criteria_id;
            }
        
            // Add the grade to the 2 dimensional array
            $rows[$record->user_id][$record->criteria_id] = $record->score;
        }

        // dd($rows);
        return view('scoring',[
            'rows' => $rows,
            'columns' => $columns,
            'grade' => $record->score,
        ]);
    }

    public function create(){
        return view('scoring_add',[
            'criterias' => Criteria::all(),
            'users' => User::all(),
            'scorings' => Scoring::all(),
        ]);
    }

    public function store(Request $request){
        $user_id = $request->user_id;
        $score = $request->score;
        $criteria_id = $request->criteria_id;

        for($i=0;$i<count($score);$i++){
            $user_id_increment[] = implode($user_id);
        }
        
        for($i=0;$i<count($score);$i++){

            $datasave = [
                'user_id' => $user_id_increment[$i],
                'score' => $score[$i],
                'criteria_id' => $criteria_id[$i],
            ];
            // dd($score);
            Scoring::create($datasave);
        }
        return redirect()->route('scoring')->with('success', 'The data has been updated');
    }
    

}

