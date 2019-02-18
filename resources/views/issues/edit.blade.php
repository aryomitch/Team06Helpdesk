@extends('layouts.template')

@section('content')

<div class="container loginForm boxShadow">
    <div class="center">
        <h2>Edit Problem</h2>
    </div>
    {!! Form::open(['action' => ['IssuesController@update', $issue->id], 'method' => 'post']) !!}
        <div class="form-group">
            {{Form::label('caller_id', 'Caller ID')}} <span class="badge badge-pill badge-secondary">Required</span>
            <select name="caller_id" id="caller_id" for='caller_id' class="form-control">
                @foreach($employees as $employee)
                    @if ($issue->caller_id === $employee->id)
                    <option value="{{$issue->caller_id}}" selected> ID: {{$employee->id}} - {{$employee->full_name}} </option>

                    @else
                        <option value="{{$employee->id}}">ID: {{$employee->id}} - {{$employee->full_name}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-row">
            <div class="form-group col">
                {{Form::label('software', 'Software')}}
                <select name="software" id="software" for='software' class="form-control">
                    @foreach($softwares as $software)
                        @if ($issue->software === $software->id)
                        <option value="{{$issue->software}}" selected>{{$software->software_name}}</option>
                        @else
                        <option value="{{$software->id}}">{{$software->software_name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group col">
                {{Form::label('hardware', 'Hardware')}}
                <select name="hardware" id="hardware" for='hardware' class="form-control">
                    @foreach($hardwares as $hardware)
                        @if ($issue->hardware === $hardware->id)
                        <option value="{{$issue->hardware}}" selected>{{$hardware->hardware_name}} - {{$hardware->serial_number}}</option>
                        @else
                        <option value="{{$hardware->id}}">{{$hardware->hardware_name}} - {{$hardware->serial_number}} </option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            {{Form::label('operating_system', 'Operating System')}}
            <select name="operating_system" id="operating_system" for='operating_system' class="form-control">
                @foreach($operatingsystems as $operatingsystem)
                    @if ($issue->operating_system === $operatingsystem->id)
                        <option value="{{$issue->operating_system}}" selected>{{$operatingsystem->operating_system}}</option>
                        @else
                        <option value="{{$operatingsystem->id}}">{{$operatingsystem->operating_system}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
                {{Form::label('issue_name', 'Problem Name')}} <span class="badge badge-pill badge-secondary">Required</span>
                {{Form::text('issue_name', $issue->issue_name, ['class' => 'form-control'])}}
            </div>
        <div class="form-group">
            {{Form::label('issue_description', 'Problem Description')}} <span class="badge badge-pill badge-secondary">Required</span>
            {{Form::textarea('issue_description', $issue->issue_description, ['class' => 'form-control', 'rows' => '3'])}}
        </div>
        <div class="form-group">
            {{Form::label('category', 'Category')}} <span class="badge badge-pill badge-secondary">Required</span>
            <select name="category" id="category" for='category' class="form-control">
                @foreach($Categories as $Categorie)
                    @if ($issue->category === $Categorie->categoryid)
                        <option value="{{$issue->category}}" selected>{{$Categorie->category_name}}</option>
                        @else
                        <option value="{{$Categorie->categoryid}}">{{$Categorie->category_name}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            {{Form::label('priority', 'Priority')}} <span class="badge badge-pill badge-secondary">Required</span>
            <select name="priority" id="priority" for='priority' class="form-control">
                        @if ($issue->priority === 'Low')
                            <option value="Low" selected>Low</option>
                            <option value="Medium" >Medium</option>
                            <option value="High" >High</option>
                        @elseif ($issue->priority === 'Medium')
                            <option value="Low" >Low</option>
                            <option value="Medium" selected>Medium</option>
                            <option value="High" >High</option>
                        @elseif ($issue->priority === 'High')
                            <option value="Low" >Low</option>
                            <option value="Medium" >Medium</option>
                            <option value="High" selected>High</option>
                        @endif
                </select>
        </div>
            <hr>
            <div class="form-group">
                {{Form::label('specialist_id', 'Specialist')}}
                <select  name="specialist_id" id="specialist_id" for='specialist_id' class="form-control">
                        <option value="" selected>Select a specialist</option>
                    @foreach($specialists as $specialist)
                        @if ($issue->specialist_id === $specialist->id)
                            <option value="{{$issue->specialist_id}}" selected>ID: {{$specialist->id}} - {{$specialist->name}}</option>
                            @else
                            <option value="{{$specialist->id}}">ID: {{$specialist->id}} - {{$specialist->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
                <button type="button" class="btn btn-outline-primary" id="extendSpecialistButton">
                    <a class="ignoreTextDecoration" href="{{url('/specialistsearch')}}" target="_blank">Specialist Search</a>
                </button>
        <hr>
        <div class="form-group">
            {{Form::label('completed', 'Problem Resolved')}}
            {{Form::checkbox('completed', 'Yes')}}
        </div>
        <div class="form-group">
            {{Form::label('solution', 'Solution')}}
            {{Form::textarea('solution', '', ['class' => 'form-control', 'rows' => '3'])}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Update Issue', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
</div>

@extends('layouts.messages')
@extends('layouts.navbar')

@endsection