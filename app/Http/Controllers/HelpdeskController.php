<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Issue;
use App\User;
use App\NewIssue;
use DB;
use Redirect;

class HelpdeskController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $issues = NewIssue::all();
        return view('pages.dashboard')->with('issues', $issues);
    }
    // Return view completed
    public function completed()
    {
        $issues = NewIssue::all();
        return view('pages.completed')->with('issues', $issues);
    }

    //Function for passsing data into view specialist search
    public function specialistSearch()
    {
        // Database Query
        $specialistLists = User::where('role', '=', 'Specialist')->get();

        $TotalIssues = DB::table('new_issues')
            ->join('users', 'new_issues.specialist_id', '=', 'users.id')
            ->select(DB::raw('count(*) as Issue_count, users.id'))
            ->groupBy('users.id')
            ->get();

        $Totalprioritys = DB::table('new_issues')
            ->join('users', 'new_issues.specialist_id', '=', 'users.id')
            ->select(DB::raw('count(*) as Issue_count, users.id, priority'))
            ->groupBy('users.id', 'priority')
            ->get();

        $expertises = DB::table('users')
            ->join('specialist_categories', 'users.id', '=', 'specialist_id')
            ->join('categories', 'specialist_categories.category_id', '=', 'categories.categoryid')
            ->select('users.id', 'categories.category_name')
            ->get();

        // Return view with variables
        return view('pages.specialistSearch', [
            'specialistLists' => $specialistLists,
            'TotalIssues' => $TotalIssues,
            'Totalprioritys' => $Totalprioritys,
            'expertises' => $expertises
        ]);
    }

    // Return problem details view
    public function problemDetails() {
        $issues = NewIssue::all();
        return view('pages.problemdetails')->with('issues', $issues);
    }

}
