<?php

namespace App\Http\Controllers;

use App\Models\Scoring;
use App\Models\Criteria;
use Illuminate\Http\Request;

class NormalizeController extends Controller
{
   public function index(){
        $criteria_table = Criteria::all();
        $userScores = Scoring::orderBy('user_id')->orderBy('criteria_id')->get();

        foreach($criteria_table as $crit){
            $weight_array[] = $crit->weight;
        }
        $weight_sum = array_sum($weight_array);

        $weight_array[] = $criteria_table;
        for($i=0;$i<count($criteria_table);$i++){
            $criteriaWeights[] = $weight_array[$i]/$weight_sum;
        }
        
        // Calculate the maximum score for each criterion
        $maxScores = [];
        foreach ($userScores as $userScore) {
            $maxScores[$userScore->criteria_id] = max($maxScores[$userScore->criteria_id] ?? 0, $userScore->score);
        }

        // Calculate the normalized scores for each user and criterion
        $normalizedScores = [];
        foreach ($userScores as $userScore) {
            $normalizedScore = $userScore->score / $maxScores[$userScore->criteria_id];
            $normalizedScores[$userScore->user_id][$userScore->criteria_id] = $normalizedScore;
        }

        // Calculate the weighted scores for each user and criterion
        $weightedScores = [];
        foreach ($normalizedScores as $userId => $normalizedScoresByUser) {
            foreach ($normalizedScoresByUser as $criteriaId => $normalizedScore) {
                $weightedScore = $normalizedScore * $criteriaWeights[$criteriaId - 1];
                $weightedScores[$userId][$criteriaId] = $weightedScore;
            }
        }

        // Calculate the total weighted score for each user
        $totalWeightedScores = [];
        foreach ($weightedScores as $userId => $weightedScoresByUser) {
            $totalWeightedScore = array_sum($weightedScoresByUser);
            $totalWeightedScores[$userId] = $totalWeightedScore;
        }

        // Sort the users based on their total weighted score
        arsort($totalWeightedScores);

        // Create a multi-dimensional matrix to display the results
        $matrix = [];
        foreach ($totalWeightedScores as $userId => $totalWeightedScore) {
            $userScores = [];
            foreach ($weightedScores[$userId] as $criteriaId => $weightedScore) {
                $userScores[] = [
                    'criteria_id' => $criteriaId,
                    'score' => $weightedScore,
                ];
            }
            $matrix[] = [
                'user_id' => $userId,
                'total_score' => $totalWeightedScore,
                'scores' => $userScores,
            ];
        }

        // Pass the matrix to the view
        return view('normalize', [
            'matrix' => $matrix,
            'criterias' => $criteria_table,
        ]);

   }
}
