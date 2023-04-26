<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Scoring;
use App\Models\Criteria;
use Illuminate\Http\Request;

class ScoringController extends Controller
{
    public function index(){

        $scores = Scoring::orderBy('user_id')->orderBy('criteria_id')->get();
        $users = User::all();
        $criteria = Criteria::all();

        // dd($rows);
        return view('scoring',[
            'users' => $users,
            'criteria' => $criteria,
            'scores' => $scores,    
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

    public function get_update_scoring($id){
        // $criteria = Criteria::all();
        $data = Scoring::where('user_id', $id)->get();
        $data_id = $data->first();
        
        // dd($data_id->criteria->criteria);
        return view('scoring_edit', [
            'update' => $data,
            'data_id' => $data_id,
            // 'criterias' => $criteria,
        ]);
        
    }
 
    public function update(Request $req){
        $id = $req->id;
        $criteria_id = $req->criteria_id;
        $user_id = $req->user_id;
        $score = $req->score;

        for($i=0;$i<count($id);$i++){

            $datasave = [
                'score' => $score[$i],
            ];

            Scoring::where('id', $id[$i])
            ->where('criteria_id',$criteria_id[$i])
            ->update($datasave);
        }
        return redirect()->route('scoring')->with('success', "The data has been updated");
    }

    public function delete_scoring($id){
        // $data = Scoring::where('user_id', $id)->get();
        // for($i=0;$i<count($data);$i++){
            Scoring::where('user_id', $id)->delete();
        // }
        return redirect()->route('scoring')->with('success', 'The data has been deleted');
    }
    

}

