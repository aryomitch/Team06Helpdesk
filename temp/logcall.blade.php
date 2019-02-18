<!--Add this in show.blade.php under
    <div class="alert alert-success">
        <p>Solution:</p>
        <p>{{$issue->solution}}</p>
    </div>
    
    And before 
    @can('isSpecialist')
    <a href="/issues/{{$issue->id}}/edit" class="btn btn-default btn-warning ">Update Issue</a>
    @endcan-->

        <hr>
        <div class="alert alert-info">
            <p>Call log: </p>
          <!--Example call log. New calls should add to this underneath.-->
            <p>2019-02-17 15:15:00</p>
            <p>Theresa's spreadsheet formula was no recognised. Basic troubleshooting didn't help. Assigned Bert to issue.</p>
          @foreach($calls as $call)
              <!--I hope this makes sense-->
              <!--Ordered somehow by date, oldest at the top, newest at the bottom-->
              @if($call.issue_id == #currentissue.issue_id)
                  <p>{{$call.call_date}}</p>
                  <p>{{$call.call_description}}</p>
              @endif
          @endforeach
        </div>

        <!--{!! Form::open(['action' => 'IssuesController@newcall', 'method' => 'post']) !!}-->
        <!--Add issue id somehow-->
        <div class="alert alert-info" id="new_call_div" hidden>
            <p>New call</p>
            <textarea class="form-control" rows="3" name="new_call_desc" cols="50" id="new_call_desc"></textarea>
        </div>
        <input class="btn btn-primary btn-warning" type="button" value="Log New Call" id="new_call_log_btn" onclick="InputCall();">
        <input class="btn btn-primary" type="submit" value="Save New Call" id="new_call_save_btn" onclick="HideCall();" hidden>
        <input class="btn btn-primary" type="button" value="Cancel" id="new_call_cancel_btn" onclick="HideCall();" hidden>
        <!--Maybe some kind of success messages on submit. Also, load the page again so the new call shows in the call log above-->
        <!--{{Form::submit('Save New Call', ['class' => 'btn btn-primary', 'id' => 'new_call_save_btn', 'onclick' => 'SaveCall()'])}}-->
        <!--{!! Form::close() !!}-->
    <script>
        function InputCall() {
            document.getElementById("new_call_desc").value = "";
            document.getElementById("new_call_div").hidden = false;
            document.getElementById("new_call_log_btn").hidden = true
            document.getElementById("new_call_save_btn").hidden = false;
            document.getElementById("new_call_cancel_btn").hidden = false;
        }
        function HideCall() {
            document.getElementById("new_call_div").hidden = true;
            document.getElementById("new_call_log_btn").hidden = false
            document.getElementById("new_call_save_btn").hidden = true;
            document.getElementById("new_call_cancel_btn").hidden = true;
        }
    </script>
          
    //      
    // Add this a controller or some kind
    //
          
    // I don't know if this is right, but I tried to get you going.
    public function store(Request $request)
    {
        // Validate the input fields in the form
        $this->validate($request, [
            'new_call_desc' => 'required',
        ]);
        // Add call (Save to Database)
        $call = new NewCall;
        $call->call_description = $request->input('new_call_desc');
        $call->operator_id = auth()->user()->id;
        $issue->save();
        // Reload current view of issue (i.e. /issues/2), I don't know how to do that.
        //return redirect('/dashboard')->with('success', 'Issue Logged');
    }