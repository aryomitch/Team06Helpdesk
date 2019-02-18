@extends('layouts.template')

@section('content')

@can('isSpecialist')
<!--
	OR HELPDESK SOMEHOW
-->

<div class="container loginForm boxShadow">
    <div class="center">
        <h2>Problem Details</h2>
    </div>

    <!--Employee instead of Caller???-->
    <!--Have we forgotten call log?-->
@foreach ($issues as $issue)
    <div class="form-row">
        <div class="form-group col">
            {{Form::label('issue_id', 'Problem ID: ')}}
            <span id="issue_id">{{$issue->id}}</span>
        </div>
        <div class="form-group col">
            {{Form::label('caller_id', 'Caller ID: ')}}
            <span id="caller_id">{{$issue->caller_id}}</span>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col">
            {{Form::label('issue_name', 'Problem Name: ')}}
                {{Form::text('issue_name', '', ['class' => 'form-control'])}}
            <span id="issue_name">{{$issue->issue_name}}</span>
        </div>
        <div class="form-group col">
            {{Form::label('caller_name', 'Caller Name: ')}}
            <span id="caller_name">{{$issue->caller_name}}</span>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col">
            {{Form::label('operating_system', 'Operating System: ')}}
            <span id="operating_system">{{$issue->operating_system}}</span>
        </div>
        <div class="form-group col">
            {{Form::label('created_at', 'Date: ')}}
            <span id="created_at">{{$issue->created_at}}</span>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col">
            {{Form::label('software', 'Software: ')}}
            <span id="software">{{$issue->software}}</span>
        </div>
        <div class="form-group col">
              {{Form::label('hardware', 'Hardware: ')}}
            <span id="hardware">{{$issue->hardware}}</span>
        </div>
    </div>
    <div class="form-group">
        {{Form::label('description', 'Problem Description')}}
        <!--{{Form::textarea('description', '', ['class' => 'form-control', 'rows' => '3'])}}-->
        <textarea class="form-control" rows="3" cols="50" id="description" readonly>{{$issue->description}}</textarea>
    </div>
    <div class="form-group">
        {{Form::label('category', 'Category: ')}}
        <span id="category">{{$issue->category}}</span>
    </div>
    <div class="form-group">
        {{Form::label('priority', 'Priority: ')}}
        <span id="priority">{{$issue->priority}}</span>
    </div>
    <hr>
    <div class="form-group">
        {{Form::label('solution', 'Solution')}}
        <!--{{Form::textarea('solution', '', ['class' => 'form-control', 'rows' => '3'])}}-->
        <textarea class="form-control" rows="3" cols="50" id="solution" readonly>{{$issue->solution}}</textarea>
    </div>
    <div class="form-group">
        {{Form::label('completed', 'Problem Resolved')}}
        <input name="completed" type="checkbox" value="{{$issue->assigned_id}}" id="completed">
    </div>
    {!! Form::open(['action' => 'IssuesController@editofsomething', 'method' => 'post']) !!}
            {{Form::submit('Log Issue', ['class' => 'btn btn-primary'])}}

            <!--What should this do?-->
            <input class="btn btn-primary" type="submit" value="Edit/Save changes">
    {!! Form::close() !!}
</div>
@endforeach
@endcan

<script>
    function extendSpecialist() {
        var buttonShowHide = document.getElementById("specialistButton");
        if (buttonShowHide.style.display === 'none') {
            buttonShowHide.style.display = "block";
        } else {
            buttonShowHide.style.display = "none";
        }
        var SpecialistShowHide = document.getElementById("SpecialistDiv");
        if (SpecialistShowHide.style.display === 'block') {
            SpecialistShowHide.style.display = "none";
        } else {
            SpecialistShowHide.style.display = "block";
        }
    }
</script>
@extends('layouts.messages')
@extends('layouts.navbar')

@endsection