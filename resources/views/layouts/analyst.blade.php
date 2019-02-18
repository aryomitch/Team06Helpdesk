@can('isAnalyst')
{{-- Analyst View --}}
<div class="container AnalysisViewDiv">
    <div class="button-element float-left clearfix">
        {{-- Button --}}
        <button class="btn btn-default btn-circle btn-xl systemAnalysis" onclick="location.href='{{url('/systemanalysis')}}'">
            <image src="https://i.imgur.com/mbaQTHp.png" width="60" height="60"></image>
        </button>
    </div>
    <div class="sys-element">
        <h1>System Analysis</h1>
    </div>
    <div class="sys-element" id="sysdetails">
        <h4>- See number of problems solved and number ongoing</h4>
        <h4>- See number of faults for each category</h4>
        <h4>- See what hardware or software may need to be replaced or upgraded</h4>
    </div>
</div>
<div class="container AnalysisViewDiv">
    <div class="button-element float-left clearfix">
        {{-- Button --}}
        <button class="btn btn-default btn-circle btn-xl helpdeskAnalysis" onclick="location.href='{{url('/helpdeskanalysis')}}'">
                <image src="https://i.imgur.com/f6IbeGZ.png" width="60" height="60"></image>
        </button>
    </div>
    <div class="sys-element">
        <h1>Helpdesk Operator Analysis</h1>
    </div>
    <div class="sys-element" id="sysdetails">
        <h4>- See Number of calls taken by each operator</h4>
        <h4>- View how well operators can deal with problems of different priorites</h4>
        <h4>- View how many problems operators assign to specialists</h4>
    </div>
</div>
<div class="container AnalysisViewDiv">
    <div class="button-element float-left clearfix">
        {{-- Button --}}
        <button class="btn btn-default btn-circle btn-xl TechnincalAnalysis" onclick="location.href='{{url('/specialistanalysis')}}'">
                <image src="https://i.imgur.com/vVNCeru.png" width="60" height="60"></image>
        </button>
    </div>
    <div class="sys-element">
        <h1>Technical Specialist Analysis</h1>
    </div>
    <div class="sys-element" id="sysdetails">
        <h4>- View number of problems assigned to specialists</h4>
        <h4>- See number of problems solved by specialists</h4>
        <h4>- See what areas of expertise specialists have or need training in</h4>
    </div>
</div>
    <script src="{{asset('js/JQueryScript.js')}}" defer></script>
@endcan