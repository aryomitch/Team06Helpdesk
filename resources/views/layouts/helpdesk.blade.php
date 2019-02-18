@can('isHelpdesk')
<div class="container">
    <h2>Check Ongoing Issues</h2>
</div>
<div class="container boxShadow checkSpecialist overflow-auto">
    <div class="list-group">
        @if(count($issues) > 0)
            @foreach ($issues as $issue)
                @if (($issue->completed) == 'No')
                        <a href="/issues/{{$issue->id}}" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-150 justify-content-between">
                          <h5 class="boldText">{{$issue->issue_name}}</h5>
                          <small>Created on {{$issue->date_created}}</small>
                        </div>
                        <p class="mb-1">{{$issue->issue_description}}</p>
                    </a>
                @endif
                {{-- <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-150 justify-content-between">
                      <h5 class="boldText">{{$issue->issue_name}}</h5>
                      <small>{{$issue->date_created}}</small>
                    </div>
                    <p class="mb-1">{{$issue->issue_description}}</p>
                  </a> --}}
            @endforeach
        @else
            <div class="alert alert-info" role="alert">
                There is currently active issues.
              </div>
        @endif
    </div>
</div>
@endcan