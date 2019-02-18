<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dashboard', 'HelpdeskController@index');
Route::get('/specialistsearch', 'HelpdeskController@specialistSearch');
Route::get('/problemdetails', 'HelpdeskController@problemDetails');

Auth::routes();

Route::get('/', array('as' => 'login2', 'uses' => 'PagesController@login'), function() {
    if(Auth::check()){return Redirect::to('pages.dashboard');}
    return view('pages.dashboard');
});

Route::resource('issues', 'IssuesController');

Route::get('/systemanalysis', 'AnalystController@systemAnalysis');
Route::get('/helpdeskanalysis', 'AnalystController@helpdeskAnalysis');
Route::get('/specialistanalysis', 'AnalystController@specialistAnalysis');