<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Issue;
use App\NewIssue;
use App\User;
use App\Employee;
use App\Software;
use App\Hardware;
use App\Operating_system;
use App\Categorie;
use DB;
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
        $issues = NewIssue::all();
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
        $specialists = User::where('role', '=', 'Specialist')->get();
        $operatingsystems = Operating_system::all();
        $Categories = Categorie::all();
        return view('issues.create', [
            'employees' => $employees,
            'softwares' => $softwares,
            'hardwares' => $hardwares,
            'operatingsystems' => $operatingsystems,
            'Categories' => $Categories,
            'specialists' => $specialists
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
            'issue_description' => 'required',
            'category' => 'required',
            'priority' => 'required',
            'issue_name' => 'required'
        ]);

        // Create Issue (Save to Database)
        $issue = new NewIssue;
        $issue->caller_id = $request->input('caller_id');
        $issue->operator_id = auth()->user()->id;
        $issue->software = $request->input('software');
        $issue->hardware = $request->input('hardware');
        $issue->operating_system = $request->input('operating_system');
        $issue->issue_name = $request->input('issue_name');
        $issue->issue_description = $request->input('issue_description');
        $issue->category = $request->input('category');
        $issue->priority = $request->input('priority');
        $issue->completed = $request->input('completed', 'No');
        $issue->solution = $request->input('solution');
        $issue->specialist_id = $request->input('specialist_id');
        $issue->timestamps = false;
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
        // Database Query 
        $issue = NewIssue::find($id);

        $callerName = DB::table('new_issues')
            ->join('employees', 'new_issues.caller_id', '=', 'employees.id')
            ->where('new_issues.caller_id', '=', $issue->caller_id)
            ->select('employees.full_name')
            ->take(1)
            ->get();
        
        $operatorInfo = DB::table('new_issues')
            ->join('users', 'new_issues.operator_id', '=', 'users.id')
            ->where('new_issues.operator_id', '=', $issue->operator_id)
            ->select('users.name')
            ->take(1)
            ->get();
        $hardwareInfo = DB::table('new_issues')
            ->join('hardware', 'new_issues.hardware', '=', 'hardware.id')
            ->where('new_issues.hardware', '=', $issue->hardware)
            ->select('hardware.hardware_name')
            ->take(1)
            ->get();
        $softwareInfo = DB::table('new_issues')
            ->join('software', 'new_issues.software', '=', 'software.id')
            ->where('new_issues.software', '=', $issue->software)
            ->select('software.software_name')
            ->take(1)
            ->get();
        $OperatingInfo = DB::table('new_issues')
            ->join('operating_systems', 'new_issues.operating_system', '=', 'operating_systems.id')
            ->where('new_issues.operating_system', '=', $issue->operating_system)
            ->select('operating_systems.operating_system')
            ->take(1)
            ->get();
        $categoryInfo = DB::table('new_issues')
            ->join('categories', 'new_issues.category', '=', 'categories.categoryid')
            ->where('new_issues.category', '=', $issue->category)
            ->select('categories.category_name')
            ->take(1)
            ->get();
        $specialistAssigned = DB::table('new_issues')
            ->join('users', 'new_issues.specialist_id', '=', 'users.id')
            ->where('new_issues.specialist_id', '=', $issue->specialist_id)
            ->select('users.name')
            ->take(1)
            ->get();
        return view('issues.show', [
            'issue' => $issue,
            'callerName' => $callerName,
            'operatorInfo' => $operatorInfo,
            'hardwareInfo' => $hardwareInfo,
            'softwareInfo' => $softwareInfo,
            'OperatingInfo' => $OperatingInfo,
            'categoryInfo' => $categoryInfo,
            'specialistAssigned' => $specialistAssigned
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Database Query
        $employees = Employee::all();
        $softwares = Software::all();
        $hardwares = Hardware::all();
        $specialists = User::where('role', '=', 'Specialist')->get();
        $operatingsystems = Operating_system::all();
        $Categories = Categorie::all();
        $issue = NewIssue::find($id);
        return view('issues.edit', [
            'issue' => $issue,
            'employees' => $employees,
            'softwares' => $softwares,
            'hardwares' => $hardwares,
            'operatingsystems' => $operatingsystems,
            'Categories' => $Categories,
            'specialists' => $specialists
        ]);
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
        // Validate the input fields in the form
        $this->validate($request, [
            'caller_id' => 'required',
            'issue_description' => 'required',
            'category' => 'required',
            'priority' => 'required',
            'issue_name' => 'required'
        ]);

        // Create Issue (Save to Database)
        $issue = NewIssue::find($id);
        $issue->caller_id = $request->input('caller_id');
        $issue->software = $request->input('software');
        $issue->hardware = $request->input('hardware');
        $issue->operating_system = $request->input('operating_system');
        $issue->issue_name = $request->input('issue_name');
        $issue->issue_description = $request->input('issue_description');
        $issue->category = $request->input('category');
        $issue->priority = $request->input('priority');
        $issue->completed = $request->input('completed', 'No');
        $issue->solution = $request->input('solution');
        $issue->specialist_id = $request->input('specialist_id');
        $issue->timestamps = false;
        $issue->save();

        // Return to Dashboard after logging the form with a success message
        return redirect('/dashboard')->with('success', 'Issue Updated');
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
