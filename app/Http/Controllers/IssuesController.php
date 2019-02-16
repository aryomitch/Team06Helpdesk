<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Issue;
use App\User;
use App\Employee;
use App\Software;
use App\Hardware;
use App\Operating_system;
use App\Categorie;
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
        $issues = Issue::all();
        return view('pages.dashboard')->with('issues', $issues);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employee::all();
        $softwares = Software::all();
        $hardwares = Hardware::all();
        $operatingsystems = Operating_system::all();
        $Categories = Categorie::all();
        return view('issues.create', [
            'employees' => $employees,
            'softwares' => $softwares,
            'hardwares' => $hardwares,
            'operatingsystems' => $operatingsystems,
            'Categories' => $Categories
        ]);
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
            'priority' => 'required',
            'issue_name' => 'required'
        ]);

        // Create Issue (Save to Database)
        $issue = new Issue;
        $issue->caller_id = $request->input('caller_id');
        $issue->helpdesk_id = auth()->user()->id;
        $issue->software = $request->input('software');
        $issue->hardware = $request->input('hardware');
        $issue->operating_system = $request->input('operating_system');
        $issue->issue_name = $request->input('issue_name');
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
