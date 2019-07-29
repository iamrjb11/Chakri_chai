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
Route::get('/admin',function(){
    return "I am admin";
})->middleware(['auth','auth.admin']);
//GET METHODS
// Route::get('/', function () {
//     $host_url=url()->current();
//     //echo $host_url;
        
//     Session::put('host_name',$host_url);
//     //echo Session::get('host_name');
//     Session::put('header_code','1');
//     return view('home');
// });
//HomeController
Route::get('/','HomeController@index');

//CompanyController
Route::post('/create_company','CompanyController@create_company');
Route::post('/company_panel','CompanyController@company_panel')->middleware(['auth','auth.company']);
Route::get('/company_panel','CompanyController@company_panel')->middleware(['auth','auth.company']);

//myController
Route::get('/user_panel','myController@user_panel')->middleware('auth');
Route::post('/upload_cv','myController@upload_cv')->name('upload'); //name means set route name for calling

//CircularController
Route::post('/create_circular','CircularController@create_circular');
Route::get('/update_circular/{cir_id}','CircularController@update_circular');
Route::get('/visibility/{cir_id}/{show_sts}','CircularController@visibility_circular');
Route::get('/edit_circular/{cir_id}','CircularController@edit_circular');
Route::get('/circular_details/{cir_id}','CircularController@circular_details')->middleware('auth');

//ApplicationController
Route::get('/apply/{c_id}/{cir_id}','ApplicationController@apply')->middleware('auth.apply');
Route::get('/applicants_details/{cir_id}/{c_name}/{j_title}','ApplicationController@applicants_details')->middleware('auth');


//POST METHODS
Route::post('/login_user','myController@login_user');
Route::post('/login_company','myController@login_company');

// Route::post('/signup_user','myController@signup_user');


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');


// Route::get('/signup', function () {
//     //echo Session::get('host_name');
//     Session::put('header_code','2');
//     return view('sing_up');
// });
// Route::get('/r', function () {
//     //echo Session::get('host_name');
//     Session::put('header_code','3');
//     return view('welcome');
// });