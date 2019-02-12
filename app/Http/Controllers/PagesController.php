<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    // When this function is called, return pages login
    public function login(){
        return view('pages.login');
    }

}
