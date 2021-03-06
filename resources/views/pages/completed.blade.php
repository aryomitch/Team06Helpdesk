@extends('layouts.template')

@section('content')

<div class="container">
    <h2>Check Completed Issues</h2>
</div>
{{-- Completed Issues View --}}
<div class="container boxShadow checkSpecialist overflow-auto">
    <div class="list-group">
        {{-- If there is issues display --}}
        @if(count($issues) > 0)
            @foreach ($issues as $issue)
                @if (($issue->completed) === 'Yes')
                        <a href="/issues/{{$issue->id}}" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-150 justify-content-between">
                          <h5 class="boldText">ID: {{$issue->id}} - {{$issue->issue_name}}</h5>
                          <small>Created on {{$issue->date_created}}</small>
                        </div>
                        <p class="mb-1">{{$issue->issue_description}}</p>
                    </a>
                @endif
            @endforeach
        @else
        {{-- If there is no issue--}}
            <div class="alert alert-info" role="alert">
                There is currently no completed issues.
              </div>
        @endif
    </div>
</div>

@extends('layouts.messages')
@extends('layouts.navbar')

@endsection