<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Issue;
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
        $issues = Issue::all();
        return view('pages.dashboard')->with('issues', $issues);
    }
}
