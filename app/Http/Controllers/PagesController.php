<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }
    // When this function is called, return pages login
    public function login(){
        return view('pages.login');
    }

}
