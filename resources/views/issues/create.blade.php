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
            {{Form::select('caller_id', ['caller_1' => 'John Smith', 'caller_2' => 'Nicole Cross'], null, ['placeholder' => 'Select a caller ID', 'class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('software', 'Software')}}
            {{Form::select('software', ['software_1' => 'Photoshop', 'software_2' => 'Chrome', 'software_3' => 'Visual Studio', 'software_4' => 'Git'], null, ['placeholder' => 'Select a software', 'class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('operating_system', 'Operating System')}}
            {{Form::select('operating_system', ['os_1' => 'Windows 10', 'os_2' => 'Windows 8.1', 'os_3' => 'Mac OS X', 'os_4' => 'Ubuntu'], null, ['placeholder' => 'Select a operating system', 'class' => 'form-control'])}}
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
            {{Form::select('category', ['category_1' => 'Software', 'category_2' => 'Hardware', 'category_3' => 'Network', 'category_4' => 'Database'], null, ['placeholder' => 'Pick the problem category', 'class' => 'form-control'])}}
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
                <button type="button" class="btn btn-outline-secondary" id="extendSpecialistButton" onclick="extendSpecialist()">Unassign Specialist</button>
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