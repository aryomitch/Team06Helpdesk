@can('isAnalyst')
<div class="container AnalysisViewDiv">
    <div class="button-element float-left clearfix">
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

    <div id="operatoractive" style="display: none;">
        <div id="optop">
            <label for="opsel">Select an Operator:</label>
            <select class="form-control" id="opsel" style="width:100px; height:50px;">
                <option value="Alice">Alice</option>
            </select>
        </div>
        <div id="optop2">
            <button id="opsolved" class="btn-success">Solved by operator</button>
            <button id="opassigned" class="btn-primary">Assigned to Specialist</button>
            <br style="line-height:4;">
            <br style="line-height:4;">
        </div>
        <div id="opimg">
            <img src="placeholder.jpg" style="width:200px; height: 250px;" />
        </div>
        <div id="opmiddle" class="container">
            <div class="row">
                <div class="col-sm-6 form-group">
                    <div class="input-group" id="DateDemo">
                        <label for="weeklyDatePicker">Select Week:</label>
                        <input type='text' id='weeklyDatePicker' placeholder="Select Week" />
                    </div>
                </div>
            </div>
            <label>Number of Calls Taken:</label><br style="line-height:5;">
            <label>Number of Problems Solved:</label>
        </div>
        <div id="barchartvalues">
        </div>
        <div id="opbtm">
            <div id="ophigh">
                <label>High Priority:</label><br style="line-height:5;">
                <label>Number Solved:</label><br style="line-height:5;">
                <label>Number Assigned to a Specialist:</label>
            </div>
            <div id="opmed">
                <label>Medium Priority:</label><br style="line-height:5;">
                <label>Number Solved:</label><br style="line-height:5;">
                <label>Number Assigned to a Specialist:</label>
            </div>
            <div id="oplow">
                <label>Low Priority:</label><br style="line-height:5;">
                <label>Number Solved:</label><br style="line-height:5;">
                <label>Number Assigned to a Specialist:</label>
            </div>
        </div>
    </div>
    <div id="specialistactive" style="display: none;">
        <div id="spectop">
            <label for="specsel">Select a Specialist:</label>
            <select class="form-control" id="specsel" style="width:100px; height:50px;">
                <option value="Bert">Bert</option>
                <option value="Clara">Clara</option>
            </select>
        </div>
        <div id="spectop2">
            <button id="solvedpriority" class="btn-success">Problems Solved by Priority</button>
            <button id="solvedcategory" class="btn-primary">Problems Solved by Category</button>
            <br style="line-height:4;">
            <br style="line-height:4;">
        </div>
        <div id="specimg">
            <img src="placeholder.jpg" style="width:200px; height: 250px;" />
        </div>
        <div id="specmiddle" class="container">
            <div class="row">
                <div class="col-sm-6 form-group">
                    <div class="input-group" id="DateDemo2">
                        <label for="weeklyDatePicker2">Select Week:</label>
                        <input type='text' id='weeklyDatePicker2' placeholder="Select Week" />
                    </div>
                </div>
            </div>
            <label>Areas of Expertise: </label><br style="line-height:5;">
            <label>Number of Problems Ongoing:</label><br style="line-height:5;">
            <label>Number of Problems Solved:</label>
        </div>
        <div id="specbarchart">
        </div>
        <div id="specbtm">
            <div id="spechigh">
                <label>High Priority:</label><br style="line-height:5;">
                <label>Number Solved:</label><br style="line-height:5;">
            </div>
            <div id="specmed">
                <label>Medium Priority:</label><br style="line-height:5;">
                <label>Number Solved:</label><br style="line-height:5;">
            </div>
            <div id="speclow">
                <label>Low Priority:</label><br style="line-height:5;">
                <label>Number Solved:</label><br style="line-height:5;">
            </div>
        </div>
    </div>

    <script src="{{asset('js/JQueryScript.js')}}" defer></script>
@endcan