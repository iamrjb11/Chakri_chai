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

//GET METHODS
Route::get('/', function () {
    $host_url=url()->current();
    //echo $host_url;
        
    Session::put('host_name',$host_url);
    //echo Session::get('host_name');
    Session::put('header_code','1');
    return view('home');
});
Route::get('/signup', function () {
    //echo Session::get('host_name');
    Session::put('header_code','2');
    return view('sing_up');
});
Route::get('/rr', function () {
    //echo Session::get('host_name');
    Session::put('header_code','3');
    return view('company_panel');
});

Route::get('/company_panel','myController@company_panel');
Route::get('/delete_circular/{cir_id}','myController@delete_circular');
Route::get('/edit_circular/{cir_id}','myController@edit_circular');


//POST METHODS
Route::post('/login_user','myController@login_user');
Route::post('/login_company','myController@login_company');

Route::post('/signup_user','myController@signup_user');
Route::post('/signup_company','myController@signup_company');
Route::post('/create_circular','myController@create_circular');
