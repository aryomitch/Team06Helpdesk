@extends('layouts.template')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
<div class="container boxshadow spacingBetween">
    <h1>Problems Analysis</h1>
    {{-- Show Piechart --}}
    <div class="ProblemAnalysis">
        {!! $chart->container() !!}
    </div>
    {{-- Display information --}}
    <div class="container alert alert-primary ProblemAnalysisText">
        <p>Total Problems Logged: {{$totalIssuesCount}}</p>
    </div>
    <div class="container alert alert-success ProblemAnalysisText">
        <p>Problem Solved: {{$solvedProblemsCount}}</p>
    </div>
    <div class="container alert alert-danger ProblemAnalysisText">
        <p>Problem Unsolved: {{$unsolvedProblemsCount}}</p>
    </div>
</div>

<div class="container boxshadow spacingBetween">
    <h1>Number of issues by Categories</h1>
    {{-- Display barchart --}}
    <div class="ProblemAnalysis">
        {!! $barchart->container() !!}
    </div>
    {{-- Display numbers for all the categories --}}
    <div class="container alert alert-primary ProblemAnalysisCategory">
        <p>Word Processing: {{$WordProcessingCount}}</p>
        <p>Logins: {{$LoginCount}}</p>
        <p>Skype: {{$SkypeCount}}</p>
        <p>Microsoft Excel: {{$MECount}}</p>
        <p>Database Application: {{$DACount}}</p>
        <p>Photo Editing Application: {{$PEACount}}</p>
        <p>PowerPoint: {{$PPCount}}</p>
        <p>Internet Browsers: {{$IBCount}}</p>
    </div>
    <div class="container alert alert-primary ProblemAnalysisCategory">
        <p>Email Application: {{$EmailCount}}</p>
        <p>Mouses: {{$MousesCount}}</p>
        <p>Keyboards: {{$KeyboardsCount}}</p>
        <p>Screens: {{$ScreenCount}}</p>
        <p>Printers: {{$PrintersCount}}</p>
        <p>Computer Repair: {{$CRCount}}</p>
        <p>Windows Issues: {{$WICount}}</p>
        <p>Anti-Virus: {{$AVCount}}</p>

    </div>
</div>
    
{{-- Chart scripts for rendering --}}
{!! $chart->script() !!}
{!! $barchart->script() !!}









@extends('layouts.messages')
@extends('layouts.navbar')

@endsection