@extends('layouts.template')

@section('content')
{{-- Display all information about a data - Mostly database queries --}}
<div class="container boxshadow">
    <h1>{{$issue->issue_name}}</h1>
    <div class="alert alert-info showProblems30">
        <p>Caller: {{$callerName[0]->full_name}}</p>
    </div>

    <div class="alert alert-info showProblems30">
        <p>Caller ID: {{$issue->caller_id}}</p>
    </div>

    <div class="alert alert-info showProblems30">
        <p>Issue logged by: {{$operatorInfo[0]->name}} (ID: {{$issue->operator_id}})</p>
    </div>

    @if (count($categoryInfo) > 0)
        <div class="alert alert-info showProblems30">
            <p>Problem category: {{$categoryInfo[0]->category_name}}</p>
        </div>
    @endif

    @if (($issue->priority) === "Low")
        <div class="alert alert-success showProblems30">
            <p class="showProblemDetails">Priority: </p>
            <p class="showProblemDetails">{{$issue->priority}}</p>
        </div>
    @elseif (($issue->priority) === "Medium")
        <div class="alert alert-warning showProblems30">
            <p class="showProblemDetails">Priority: </p>
            <p class="showProblemDetails">{{$issue->priority}}</p>
        </div>
    @elseif (($issue->priority) === "High")
        <div class="alert alert-danger showProblems30">
            <p class="showProblemDetails">Priority: </p>
            <p class="showProblemDetails">{{$issue->priority}}</p>
        </div>
    @endif

    <div class="alert alert-info">
        <p>Problem Description: </p>
        <p>{{$issue->issue_description}}</p>
    </div>

    <hr>
    @if (count($hardwareInfo) > 0)
    <div class="alert alert-info showProblems30">
        <p>Affected Hardware: {{$hardwareInfo[0]->hardware_name}}</p>
    </div>
@else
    <div class="alert alert-info showProblems30">
        <p>Affected Hardware: None</p>
    </div>
@endif

    @if (count($softwareInfo) > 0)
        <div class="alert alert-info showProblems30">
            <p>Affected Software: {{$softwareInfo[0]->software_name}}</p>
        </div>
    @else
        <div class="alert alert-info showProblems30">
            <p>Affected Software: None</p>
        </div>
    @endif

    @if (count($OperatingInfo) > 0)
        <div class="alert alert-info showProblems30">
            <p>Affected OS: {{$OperatingInfo[0]->operating_system}}</p>
        </div>
    @else
        <div class="alert alert-info showProblems30">
            <p>Affected OS: None</p>
        </div>
    @endif

    <div class="alert alert-info showProblems30">
        <p>Problem Created: {{$issue->date_created}}</p>
    </div>

    <hr>
    @if (count($specialistAssigned) > 0)
        <div class="alert alert-info showProblems30">
            <p>Specialist Assigned: {{$specialistAssigned[0]->name}}</p>
        </div>
    @else
        <div class="alert alert-info showProblems30">
            <p>Specialist Assigned: None</p>
        </div>
    @endif

    @if (($issue->completed == "Yes"))
        <div class="alert alert-success showProblems30">
            <p>Problem Status: Completed</p>
        </div>
    @else
        <div class="alert alert-danger showProblems30">
            <p>Problem Status: Ongoing</p>
        </div>
    @endif

    <div class="alert alert-success">
        <p>Solution:</p>
        <p>{{$issue->solution}}</p>
    </div>

    @can('isSpecialist')

    <a href="/issues/{{$issue->id}}/edit" class="btn btn-default btn-warning ">Update Issue</a>


    @endcan
</div>


@extends('layouts.messages')
@extends('layouts.navbar')

@endsection