<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Scoring;
use App\Models\Criteria;
use Illuminate\Http\Request;

class NormalizeController extends Controller
{
   public function index(){
        $criteria = Criteria::all();
        $userScores = Scoring::orderBy('user_id')->orderBy('criteria_id')->get();
        $users = User::all();

        foreach($criteria as $crit){
            $weight_array[] = $crit->weight;
        }
        $weight_sum = array_sum($weight_array);

        $weight_array[] = $criteria;
        for($i=0;$i<count($criteria);$i++){
            $criteriaWeights[] = $weight_array[$i]/$weight_sum;
        }

        // Calculate the maximum score for each criterion
        $maxScores = [];
        $minScores = [];
        foreach ($userScores as $userScore) {
            $maxScores[$userScore->criteria_id] = max($maxScores[$userScore->criteria_id] ?? 0, $userScore->score);
            if ($criteria->firstWhere('id', $userScore->criteria_id)->min_max === 'min') {
                $minScores[$userScore->criteria_id] = min($minScores[$userScore->criteria_id] ?? PHP_INT_MAX, $userScore->score);
            }
        }

        // Calculate the normalized scores for each user and criterion
        $normalizedScores = [];
        foreach ($userScores as $userScore) {
            $maxScore = $maxScores[$userScore->criteria_id];
            $minMax = strtolower($criteria->firstWhere('id', $userScore->criteria_id)->min_max);
            if ($minMax === 'max') {
                $normalizedScore = ($userScore->score / $maxScore);
            } else {
                $minScore = $minScores[$userScore->criteria_id] ?? 0;
                if ($userScore->score === $minScore) {
                    $normalizedScore = 1;
                } else {
                    $normalizedScore = ($minScore / $userScore->score);
                }
            }
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
            $userName = $users->firstWhere('id', $userId)->name;
            $userScores = [];
            foreach ($weightedScores[$userId] as $criteriaId => $weightedScore) {
                $criteriaName = $criteria->firstWhere('id', $criteriaId)->criteria_name;
                $userScores[] = [
                    'criteria_name' => $criteriaName,
                    'score' => $weightedScore,
                ];
            }
            $matrix[] = [
                'user_id' => $userId,
                'user_name' => $userName,
                'total_score' => $totalWeightedScore,
                'scores' => $userScores,
            ];
        }

        // Pass the matrix to the view
        return view('normalize', [
            'matrix' => $matrix,
            'criterias' => $criteria,
            'users' => $users,
            'normalizedScores' => $normalizedScores,
        ]);

   }
}
