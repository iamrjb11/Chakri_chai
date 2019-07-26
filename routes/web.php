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
    echo Session::get('host_name');
    return view('home');
});
Route::get('/singup', function () {
    echo Session::get('host_name');
    return view('sing_up');
});


//POST METHODS
Route::post('/login_user','myController@login_user');
Route::post('/login_company','myController@login_company');

Route::post('/signup_user','myController@signup_user');
Route::post('/signup_company','myController@signup_company');
