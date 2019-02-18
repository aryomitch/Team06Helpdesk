<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Charts\problemAnalysis;
use App\NewIssue;
use App\Categorie;

class AnalystController extends Controller
{
    public function systemAnalysis(){
        // Get all the solved and unsolved problems
        $totalIssues = NewIssue::all();
        $solvedProblems = NewIssue::where('completed', '=', 'Yes')->get();
        $unsolvedProblems = NewIssue::where('completed', '=', 'No')->get();
        // Count all the solved and unsolved problems
        $solvedProblemsCount = count($solvedProblems);
        $unsolvedProblemsCount = count($unsolvedProblems);
        $totalIssuesCount = count($totalIssues);

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

        //Get data for categorires for bar chart
        $WordProcessingCount = count(NewIssue::where('category', '=', '1')->get());
        $LoginCount = count(NewIssue::where('category', '=', '2')->get());
        $SkypeCount = count(NewIssue::where('category', '=', '3')->get());
        $MECount = count(NewIssue::where('category', '=', '4')->get());
        $DACount = count(NewIssue::where('category', '=', '5')->get());
        $PEACount = count(NewIssue::where('category', '=', '6')->get());
        $PPCount = count(NewIssue::where('category', '=', '7')->get());
        $IBCount = count(NewIssue::where('category', '=', '8')->get());
        $EmailCount = count(NewIssue::where('category', '=', '9')->get());
        $MousesCount = count(NewIssue::where('category', '=', '10')->get());
        $KeyboardsCount = count(NewIssue::where('category', '=', '11')->get());
        $ScreenCount = count(NewIssue::where('category', '=', '12')->get());
        $PrintersCount = count(NewIssue::where('category', '=', '13')->get());
        $CRCount = count(NewIssue::where('category', '=', '14')->get());
        $WICount = count(NewIssue::where('category', '=', '15')->get());
        $AVCount = count(NewIssue::where('category', '=', '16')->get());

        

        // Create a bar chart
        $barchart = new problemAnalysis;
        $barchart->labels(['Word Processing','Logins', 'Skype', 'Microsoft Excel', 'Database Applications', 'Photo Editing Applications', 'PowerPoint', 'Internet Browsers', 'Email Applications', 'Mouses', 'Keyboards', 'Screens', 'Printers', 'Computer Repair', 'Windows Issues', 'Anti-Virus']);
        $dataset = $barchart->dataset('Number of issues', 'horizontalBar', [$WordProcessingCount, $LoginCount, $SkypeCount, $MECount, $DACount, $PEACount, $PPCount, $IBCount, $EmailCount, $MousesCount, $KeyboardsCount, $ScreenCount, $PrintersCount, $CRCount, $WICount, $AVCount]);
        $dataset->backgroundColor(collect(['#13FF00','#FF2D00']));
        $dataset->color('#000');
        $barchart->options([
            'tooltip' => [
                'show' => true // or false, depending on what you want.
            ]
        ]);

        // Return the variable to the view
        return view('analyst.systemAnalysis', [
            'chart' => $chart,
            'barchart' => $barchart,
            'solvedProblemsCount' => $solvedProblemsCount,
            'unsolvedProblemsCount' => $unsolvedProblemsCount,
            'totalIssuesCount' => $totalIssuesCount,
            'WordProcessingCount' => $WordProcessingCount,
            'LoginCount' => $LoginCount,
            'SkypeCount' => $SkypeCount,
            'MECount' => $MECount,
            'DACount' => $DACount,
            'PEACount' => $PEACount,
            'PPCount' => $PPCount,
            'IBCount' => $IBCount,
            'EmailCount' => $EmailCount,
            'MousesCount' => $MousesCount,
            'KeyboardsCount' => $KeyboardsCount,
            'ScreenCount' => $ScreenCount,
            'PrintersCount' => $PrintersCount,
            'CRCount' => $CRCount,
            'WICount' => $WICount,
            'AVCount' => $AVCount

        ]);
    }
    public function helpdeskAnalysis(){
        return view('analyst.helpdeskAnalysis');
    }
    public function specialistAnalysis(){
        return view('analyst.technicalAnalysis');
    }
}
