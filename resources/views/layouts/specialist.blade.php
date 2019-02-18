@can('isSpecialist')
<div class="container">
    <h2>Specialist View</h2>
</div>
@if(count($issues) > 0)
	<div class="container boxShadow checkIssues overflow-auto">
		<div class="list-group" id="high_priority">
			@foreach ($issues as $issue)
				@if($issue->specialist_id == auth()->user()->id && $issue->priority == "High" && $issue->completed == 'No')
					<a href="/issues/{{$issue->id}}" class="list-group-item list-group-item-action flex-column align-items-start">
						<div class="d-flex w-150 justify-content-between">
							<h5 class="boldText">{{$issue->issue_name}} - Priority: {{$issue->priority}}</h5>
							<small>{{$issue->date_created}}</small>
						</div>
						<p class="mb-1">{{$issue->issue_description}}</p>
					</a>
				@endif
			@endforeach
		</div>
		<div class="list-group" id="med_priority">
			@foreach ($issues as $issue)
				@if($issue->specialist_id == auth()->user()->id && $issue->priority == "Medium" && $issue->completed == 'No')
					<a href="/issues/{{$issue->id}}" class="list-group-item list-group-item-action flex-column align-items-start">
						<div class="d-flex w-150 justify-content-between">
							<h5 class="boldText">{{$issue->issue_name}} - Priority: {{$issue->priority}}</h5>
							<small>{{$issue->date_created}}</small>
						</div>
						<p class="mb-1">{{$issue->issue_description}}</p>
					</a>
				@endif
			@endforeach
		</div>
		<div class="list-group" id="low_priority">
			@foreach ($issues as $issue)
				@if($issue->specialist_id == auth()->user()->id && $issue->priority == "Low" && $issue->completed == 'No')
					<a href="/issues/{{$issue->id}}" class="list-group-item list-group-item-action flex-column align-items-start">
						<div class="d-flex w-150 justify-content-between">
							<h5 class="boldText">{{$issue->issue_name}} - Priority: {{$issue->priority}}</h5>
							<small>{{$issue->date_created}}</small>
						</div>
						<p class="mb-1">{{$issue->issue_description}}</p>
					</a>
				@endif
			@endforeach
		</div>
	</div>
@else
    <div class="alert alert-info" role="alert">
        You currently have no active issues.
    </div>
@endif
<script>
    function SwitchTab(TabIndex) {
        document.getElementById("high_priority").hidden = (TabIndex == 0) ? false : true;
        document.getElementById("med_priority").hidden = (TabIndex == 1) ? false : true;
        document.getElementById("low_priority").hidden = (TabIndex == 2) ? false : true;
    }

	function ShowAll(TabIndex) {
        document.getElementById("high_priority").hidden = (TabIndex == 1) ? false : true;
        document.getElementById("med_priority").hidden = (TabIndex == 1) ? false :true;
        document.getElementById("low_priority").hidden = (TabIndex == 1) ? false :true;
    }
</script>
@endcan
{{-- @can('isSpecialist')
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" onclick="SwitchTab(0);"}">High priority (*issue count*)</a>
		</li>
	</ul>
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" onclick="SwitchTab(1);">Medium prority (*issue count*)</a>
		</li>
	</ul>
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" onclick="SwitchTab(2);">Low priority (*issue count*)</a>
		</li>
	</ul>
@endcan --}}