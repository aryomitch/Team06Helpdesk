@extends('layouts.template')

@section('content')

<div class="container boxshadow">
    <div class="row">
        <div class="col-3">
            <div class="list-group" id="list-tab" role="tablist">
                @foreach ($helpdeskUsers as $helpdeskUser)
                    <a class="list-group-item list-group-item-action" data-toggle="list" href="#id{{$helpdeskUser->id}}" role="tab">ID: {{$helpdeskUser->id}} - {{$helpdeskUser->name}}</a>
                @endforeach
            </div>
        </div>
        <div class="col-9">
            <div class="tab-content" id="nav-tabContent">
                @foreach ($helpdeskUsers as $helpdeskUser)
                    <div class="tab-pane fade" id="id{{$helpdeskUser->id}}" role="tabpanel">
                        {{-- Show profile picture --}}
                        <div class="container helpdeskShow center">
                            <img src="https://i.imgur.com/MZ67CqR.png" class="rounded helpdeskImg">
                            <h3>{{$helpdeskUser->name}}</h3>
                        </div>

                        {{-- Number of problem logged --}}
                        <div class="helpdeskDivs">
                            @php
                                $problembool = false;
                            @endphp
                            
                            @foreach ($ProblemsLogged as $ProblemLogged)
                                @if ($helpdeskUser->id == $ProblemLogged->id)
                                    <div class="alert alert-primary center">
                                        <p>Number of problems logged:</p>
                                        <p>{{$ProblemLogged->Issue_count}}</p>
                                    </div>
                                    @php
                                        $problembool = true;
                                    @endphp
                                    @break
                                @endif
                            @endforeach
                            @if ($problembool === false)
                            <div class="alert alert-primary center"><p>Number of problem logged:</p>
                            <p>0</p></div>
                            @endif
                        </div>

                        {{-- Solved by Helpdesk Operator --}}
                        <div class="helpdeskDivs">
                            @foreach ($ProblemsSolved as $ProblemSolved)
                                @if ($ProblemSolved->specialist_id === NULL && $ProblemSolved->completed === 'Yes' && $helpdeskUser->id == $ProblemSolved->id)
                                    <div class="alert alert-primary center">
                                        <p>Number of problems solved:</p>
                                        <p>{{$ProblemSolved->Issue_count}}</p>
                                    </div>
                                @endif
                                
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@extends('layouts.messages')
@extends('layouts.navbar')

@endsection