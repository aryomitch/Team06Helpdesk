@can('isSpecialist')
<div class="container">
    <h2>Specialist View</h2>
</div>
@if(count($issues) > 0)
	<div class="container boxShadow checkIssues overflow-auto">
		<div class="list-group" id="high_priority">
			@foreach ($issues as $issue)
				@if($issue->assigned_id == $auth()->user()->id && $issue->priority == "high")
					<a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
						<div class="d-flex w-150 justify-content-between">
							<h5 class="boldText">{{$issue->issue_name}}</h5>
							<small>{{$issue->created_at}}</small>
						</div>
						<p class="mb-1">{{$issue->description}}</p>
					</a>
				@endif
			@endforeach
		</div>
		<div class="list-group" id="med_priority" hidden>
			@foreach ($issues as $issue)
				@if($issue->assigned_id == $auth()->user()->id && $issue->priority == "medium")
					<a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
						<div class="d-flex w-150 justify-content-between">
							<h5 class="boldText">{{$issue->issue_name}}</h5>
							<small>{{$issue->created_at}}</small>
						</div>
						<p class="mb-1">{{$issue->description}}</p>
					</a>
				@endif
			@endforeach
		</div>
		<div class="list-group" id="low_priority" hidden>
			@foreach ($issues as $issue)
				@if($issue->assigned_id == $auth()->user()->id && $issue->priority == "low")
					<a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
						<div class="d-flex w-150 justify-content-between">
							<h5 class="boldText">{{$issue->issue_name}}</h5>
							<small>{{$issue->created_at}}</small>
						</div>
						<p class="mb-1">{{$issue->description}}</p>
					</a>
				@endif
			@endforeach
		</div>
	</div>
<script>
	function SwitchTab(TabIndex) {
		document.getElementById("high_priority").hidden = (TabIndex == 0) ? true : false;
		document.getElementById("med_priority").hidden = (TabIndex == 1) ? true : false;
		document.getElementById("low_priority").hidden = (TabIndex == 2) ? true : false;
	}
</script>
@else
    <div class="alert alert-info" role="alert">
        You currently have no active issues.
    </div>
@endif
@endcan

//
// Add the following to navbar.blade.php
//

// Add amount of issue of each priority somehow.
@can('isSpecialist')
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
@endcan