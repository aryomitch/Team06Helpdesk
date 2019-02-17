<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnalystController extends Controller
{
    public function systemAnalysis(){
        return view('analyst.systemAnalysis');
    }
    public function helpdeskAnalysis(){
        return view('analyst.helpdeskAnalysis');
    }
    public function specialistAnalysis(){
        return view('analyst.technicalAnalysis');
    }
}
