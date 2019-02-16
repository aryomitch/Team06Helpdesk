@extends('layouts.template')

@section('content')

@can('isHelpdesk')

<div class="container loginForm boxShadow">
    <div class="center">
        <h2>Log Problem</h2>
    </div>
    {!! Form::open(['action' => 'IssuesController@store', 'method' => 'post']) !!}
        <div class="form-group">
            {{Form::label('caller_id', 'Caller ID')}} <span class="badge badge-pill badge-secondary">Required</span>
            <select name="caller_id" id="caller_id" for='caller_id' class="form-control">
                    <option selected>Select a caller ID</option>
                @foreach($employees as $employee)
                        <option value="{{$employee->id}}">ID: {{$employee->id}} - {{$employee->full_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-row">
            <div class="form-group col">
                {{Form::label('software', 'Software')}}
                <select name="software" id="software" for='software' class="form-control">
                        <option selected>Select a software</option>
                    @foreach($softwares as $software)
                            <option value="{{$software->id}}">{{$software->software_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col">
                {{Form::label('hardware', 'Hardware')}}
                <select name="hardware" id="hardware" for='hardware' class="form-control">
                        <option selected>Select a hardware</option>
                    @foreach($hardwares as $hardware)
                            <option value="{{$hardware->id}}">{{$hardware->hardware_name}} - {{$hardware->serial_number}} </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            {{Form::label('operating_system', 'Operating System')}}
            <select name="operating_system" id="operating_system" for='operating_system' class="form-control">
                    <option selected>Select a operating system</option>
                @foreach($operatingsystems as $operatingsystem)
                        <option value="{{$operatingsystem->id}}">{{$operatingsystem->operating_system	}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
                {{Form::label('issue_name', 'Problem Name')}} <span class="badge badge-pill badge-secondary">Required</span>
                {{Form::text('issue_name', '', ['class' => 'form-control'])}}
            </div>
        <div class="form-group">
            {{Form::label('description', 'Problem Description')}} <span class="badge badge-pill badge-secondary">Required</span>
            {{Form::textarea('description', '', ['class' => 'form-control', 'rows' => '3'])}}
        </div>
        <div class="form-group">
            {{Form::label('category', 'Category')}} <span class="badge badge-pill badge-secondary">Required</span>
            <select name="category" id="category" for='category' class="form-control">
                    <option selected>Pick the problem category</option>
                @foreach($Categories as $Categorie)
                        <option value="{{$Categorie->CategoryID}}">{{$Categorie->Category_Name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            {{Form::label('priority', 'Priority')}} <span class="badge badge-pill badge-secondary">Required</span>
            {{Form::select('priority', ['low' => 'Low', 'medium' => 'Medium', 'high' => 'High'], null, ['placeholder' => 'Assign the priority', 'class' => 'form-control'])}}
        </div>
        <div id="specialistButton">
            <button type="button" class="btn btn-outline-secondary" id="extendSpecialistButton" onclick="extendSpecialist()">Assign Specialist</button>
        </div>
        <div id="SpecialistDiv">
            <hr>
            <div class="form-group">
                {{Form::label('assigned_id', 'Specialist')}}
                {{Form::select('assigned_id', ['low' => 'Low', 'medium' => 'Medium', 'high' => 'High'], null, ['placeholder' => 'Assign a specialist', 'class' => 'form-control'])}}
             </div>

            <div id="specialistButton">
                <button type="button" class="btn btn-outline-primary" id="extendSpecialistButton" onclick="extendSpecialist()">Unassign Specialist</button>
            </div>
        </div>
        <hr>
        <div class="form-group">
            {{Form::label('completed', 'Problem Resolved')}}
            {{Form::checkbox('completed', '1')}}
        </div>
        <div class="form-group">
            {{Form::label('solution', 'Solution')}}
            {{Form::textarea('solution', '', ['class' => 'form-control', 'rows' => '3'])}}
        </div>
        {{Form::submit('Log Issue', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
</div>
@endcan
...
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

@extends('layouts.navbar')

@endsection