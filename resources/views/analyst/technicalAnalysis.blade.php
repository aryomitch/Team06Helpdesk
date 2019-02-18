@extends('layouts.template')

@section('content')

<div class="container boxshadow">
    <div class="row">
        <div class="col-3">
            <div class="list-group" id="list-tab" role="tablist">
                @foreach ($SpecialistUsers as $SpecialistUser)
                    <a class="list-group-item list-group-item-action" data-toggle="list" href="#id{{$SpecialistUser->id}}" role="tab">ID: {{$SpecialistUser->id}} - {{$SpecialistUser->name}}</a>
                @endforeach
            </div>
        </div>
        <div class="col-9">
            <div class="tab-content" id="nav-tabContent">
                @foreach ($SpecialistUsers as $SpecialistUser)
                    <div class="tab-pane fade" id="id{{$SpecialistUser->id}}" role="tabpanel">
                        {{-- Show profile picture --}}
                        <div class="container helpdeskShow center">
                            <img src="https://i.imgur.com/MZ67CqR.png" class="rounded helpdeskImg">
                            <h3>{{$SpecialistUser->name}}</h3>
                        </div>

                        {{-- Number of problem assigned to me --}}
                        <div class="helpdeskDivs">
                            @php
                                $problembool = false;
                            @endphp
                            @foreach ($AssignedProblems as $AssignedProblem)
                                @if ($SpecialistUser->id == $AssignedProblem->id)
                                    <div class="alert alert-primary center">
                                        <p>Number of problems assigned:</p>
                                        <p>{{$AssignedProblem->Issue_count}}</p>
                                    </div>
                                    @php
                                        $problembool = true;
                                    @endphp
                                    @break
                                @endif
                            @endforeach
                            @if ($problembool === false)
                            <div class="alert alert-primary center"><p>Number of problems assigned:</p>
                            <p>0</p></div>
                            @endif
                        </div>

                        {{-- Solved Issues --}}
                        <div class="helpdeskDivs">
                            @php
                                $problembool = false;
                            @endphp
                            @foreach ($ProblemsStatus as $ProblemsStatu)
                                @if ($SpecialistUser->id == $ProblemsStatu->id && $ProblemsStatu->completed === "Yes")
                                    <div class="alert alert-primary center">
                                        <p>Number of problems that is solved:</p>
                                        <p>{{$ProblemsStatu->Issue_count}}</p>
                                    </div>
                                    @php
                                        $problembool = true;
                                    @endphp
                                    @break
                                @endif
                            @endforeach
                            @if ($problembool === false)
                            <div class="alert alert-primary center"><p>Number of problems that is solved:</p>
                            <p>0</p></div>
                            @endif
                        </div>

                        {{-- Ongoing Issues --}}
                        <div class="helpdeskDivs">
                            @php
                                $problembool = false;
                            @endphp
                            @foreach ($ProblemsStatus as $ProblemsStatu)
                                @if ($SpecialistUser->id == $ProblemsStatu->id && $ProblemsStatu->completed === "No")
                                    <div class="alert alert-primary center">
                                        <p>Number of problems that is ongoing:</p>
                                        <p>{{$ProblemsStatu->Issue_count}}</p>
                                    </div>
                                    @php
                                        $problembool = true;
                                    @endphp
                                    @break
                                @endif
                            @endforeach
                            @if ($problembool === false)
                            <div class="alert alert-primary center"><p>Number of problems that is ongoing:</p>
                            <p>0</p></div>
                            @endif
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