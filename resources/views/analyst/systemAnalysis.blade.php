@extends('layouts.template')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
<div class="container boxshadow">
    <h1>Problems Analysis</h1>
    <div class="ProblemAnalysis">
        {!! $chart->container() !!}
    </div>
    <div class="container alert alert-success ProblemAnalysisText">
        <p>Problem Solved: {{$solvedProblemsCount}}</p>
    </div>
    <div class="container alert alert-danger ProblemAnalysisText">
        <p>Problem Unsolved: {{$unsolvedProblemsCount}}</p>
    </div>
</div>

<div class="container boxshadow">
        <h1>Number of issues by Categories</h1>
        <div class="ProblemAnalysis">
            
        </div>
        <div class="container alert alert-success ProblemAnalysisText">
            <p>Problem Solved: {{$solvedProblemsCount}}</p>
        </div>
        <div class="container alert alert-danger ProblemAnalysisText">
            <p>Problem Unsolved: {{$unsolvedProblemsCount}}</p>
        </div>
    </div>
    

{!! $chart->script() !!}









@extends('layouts.messages')
@extends('layouts.navbar')

@endsection