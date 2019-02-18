@extends('layouts.template')

@section('content')

{{-- Specialist Search Div Box --}}
<div class="container center">
    <h2>Specialist Search</h2>
</div>
{{-- Div Container for Div Box --}}
{{-- Display specialist in the system --}}
<div class="container boxShadow overflow-auto checkSpecialist">
    <div class="row ">
        <div class="col-4">
            <div class="list-group" role="tablist">
                @if(count($specialistLists) > 0)
                    @foreach ($specialistLists as $specialistList)
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#id{{$specialistList->id}}" role="tab">{{$specialistList->name}}</a>
                    @endforeach
                @else
                    <div class="alert alert-info" role="alert">
                        There is no specialist
                        </div>
                @endif
            </div>
        </div>
        <div class="col-8 specialistSearchProfileDisplay">
            <div class="tab-content" id="nav-tabContent">
                @if(count($specialistLists) > 0)
                    @foreach ($specialistLists as $specialistList)
                        <div class="tab-pane fade" id="id{{$specialistList->id}}" role="tabpanel">
                            <div class="container speicalistSearchInfo">
                                <div class="alert alert-primary">
                                <h3 class="center">{{$specialistList->name}}</h3>
                                </div>

                                {{-- Display Speicalist Info --}}
                                <div class="alert alert-info">
                                        <p>User ID: {{$specialistList->id}}</p>
                                        <p class="specialistExpertise">Specialist Expertise:</p>
                                        @foreach ($expertises as $expertise)
                                            @if (($specialistList->id) == ($expertise->id))
                                                <p class="specialistExpertise">- "{{$expertise->category_name}}"</p>
                                            @endif
                                        @endforeach
                                    </div>
    
                                {{-- Display number of assigned task --}}
                                <div class="alert alert-info spSearchTaskAssigned">
                                @if (count($TotalIssues) > 0)
                                    @php
                                        $IssueFound = false;
                                        $highP = false;
                                        $mediumP = false;
                                        $lowP = false;
                                    @endphp
                                    @foreach ($TotalIssues as $TotalIssue)
                                        @if (($specialistList->id) == ($TotalIssue->id))
                                            <p>Number of assigned task:</p>
                                            <p>{{$TotalIssue->Issue_count}}</p>
                                            @php
                                                $IssueFound = true
                                            @endphp
                                            @break
                                        @endif
                                    @endforeach
                                    @if ($IssueFound === false)
                                        <p>Number of assigned task:</p>
                                        <p>0</p>
                                    @endif
                                @endif
                                </div>

                                {{-- Display High Priority --}}
                                <div class="alert alert-danger spSearchPriorityBox">
                                @if (count($Totalprioritys) > 0)
                                    @foreach ($Totalprioritys as $Totalpriority)
                                        @if (($specialistList->id) == ($Totalpriority->id) && ($Totalpriority->priority) == ('High'))
                                            <p>Total High Priority Issues:</p>
                                            <p>{{$Totalpriority->Issue_count}}</p>
                                            @php
                                                $highP = true
                                            @endphp
                                            @break
                                        @endif
                                    @endforeach
                                    @if ($highP === false)
                                        <p>Total High Priority Issues:</p>
                                        <p>0</p>
                                    @endif
                                @endif
                                </div>

                                {{-- Display Medium Priority --}}
                                <div class="alert alert-warning spSearchPriorityBox2">
                                @if (count($Totalprioritys) > 0)
                                    @foreach ($Totalprioritys as $Totalpriority)
                                        @if (($specialistList->id) == ($Totalpriority->id) && ($Totalpriority->priority) == ('Medium'))
                                            <p>Total Medium Priority Issues:</p>
                                            <p>{{$Totalpriority->Issue_count}}</p>
                                            @php
                                                $mediumP = true
                                            @endphp
                                            @break
                                        @endif
                                    @endforeach
                                    @if ($mediumP === false)
                                        <p>Total Medium Priority Issues:</p>
                                        <p>0</p>
                                    @endif
                                @endif
                                </div>

                                {{-- Display Low Priority --}}
                                <div class="alert alert-success spSearchPriorityBox">
                                @if (count($Totalprioritys) > 0)
                                    @foreach ($Totalprioritys as $Totalpriority)
                                        @if (($specialistList->id) == ($Totalpriority->id) && ($Totalpriority->priority) == ('Low'))
                                            <p>Total Low Priority Issues:</p>
                                            <p>{{$Totalpriority->Issue_count}}</p>
                                            @php
                                                $lowP = true
                                            @endphp
                                            @break
                                        @endif
                                    @endforeach
                                    @if ($lowP === false)
                                        <p>Total Low Priority Issues:</p>
                                        <p>0</p>
                                    @endif
                                @endif
                                </div>

                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="alert alert-info" role="alert">
                        There is no specialist
                        </div>
                @endif
            </div>
        </div>
    </div>
</div>

@extends('layouts.messages')
@extends('layouts.navbar')

@endsection