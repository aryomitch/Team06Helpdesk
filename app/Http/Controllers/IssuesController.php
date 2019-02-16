<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Issue;
use Redirect;

class IssuesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Issue::all();
        return view('issues.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('issues.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the input fields in the form
        $this->validate($request, [
            'caller_id' => 'required',
            'description' => 'required',
            'category' => 'required',
            'priority' => 'required'
        ]);

        // Create Issue (Save to Database)
        $issue = new Issue;
        $issue->caller_id = $request->input('caller_id');
        $issue->helpdesk_id = auth()->user()->id;
        $issue->software = $request->input('software');
        $issue->operating_system = $request->input('operating_system');
        $issue->description = $request->input('description');
        $issue->category = $request->input('category');
        $issue->priority = $request->input('priority');
        $issue->completed = $request->input('completed');
        $issue->solution = $request->input('solution');
        $issue->assigned_id = $request->input('assigned_id');
        $issue->save();

        // Return to Dashboard after logging the form with a success message
        return redirect('/dashboard')->with('success', 'Issue Logged');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
