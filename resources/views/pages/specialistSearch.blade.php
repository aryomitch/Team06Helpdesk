@extends('layouts.template')

@section('content')

{{-- Specialist Search Div Box --}}
<div class="container">
    <h2>Specialist Search</h2>
</div>
{{-- Div Container for Div Box --}}
{{-- Display specialist in the system --}}
<div class="container boxShadow checkIssues overflow-auto">
    <div class="row ">
        <div class="col-4">
            <div class="list-group" role="tablist">
                @if(count($specialistLists) > 0)
                    @foreach ($specialistLists as $specialistList)
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#id{{$specialistList->id}}" role="tab">{{$specialistList->name}}</a>
                    @endforeach
                @else
                    <div class="alert alert-info" role="alert">
                        There is currently active issues.
                        </div>
                @endif
            </div>
        </div>
        <div class="col-8 specialistSearchProfileDisplay">
            <div class="tab-content" id="nav-tabContent">
                @if(count($specialistLists) > 0)
                    @foreach ($specialistLists as $specialistList)
                        <div class="tab-pane fade" id="id{{$specialistList->id}}" role="tabpanel">{{$specialistList->name}}</div>
                    @endforeach
                @else
                    <div class="alert alert-info" role="alert">
                        There is currently active issues.
                        </div>
                @endif
            </div>
        </div>
    </div>
</div>

@extends('layouts.messages')
@extends('layouts.navbar')

@endsection