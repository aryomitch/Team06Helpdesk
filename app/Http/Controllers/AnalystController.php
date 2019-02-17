<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Charts\problemAnalysis;
use App\Issue;

class AnalystController extends Controller
{
    public function systemAnalysis(){
        // Get all the solved and unsolved problems
        $solvedProblems = Issue::where('completed', '=', 1)->get();
        $unsolvedProblems = Issue::where('completed', '=', NULL)->get();
        // Count all the solved and unsolved problems
        $solvedProblemsCount = count($solvedProblems);
        $unsolvedProblemsCount = count($unsolvedProblems);

        // Create a pie chart
        $chart = new problemAnalysis;
        $chart->labels(['Solved', 'Unsolved']);
        $dataset = $chart->dataset('Problem Analysis', 'pie', [$solvedProblemsCount, $unsolvedProblemsCount]);
        $dataset->backgroundColor(collect(['#13FF00','#FF2D00']));
        $chart->minimalist(true);
        $dataset->color('#000');
        $chart->options([
            'tooltip' => [
                'show' => true // or false, depending on what you want.
            ]
        ]);

        // Return the variable to the view
        return view('analyst.systemAnalysis', [
            'chart' => $chart,
            'solvedProblemsCount' => $solvedProblemsCount,
            'unsolvedProblemsCount' => $unsolvedProblemsCount
        ]);
    }
    public function helpdeskAnalysis(){
        return view('analyst.helpdeskAnalysis');
    }
    public function specialistAnalysis(){
        return view('analyst.technicalAnalysis');
    }
}
