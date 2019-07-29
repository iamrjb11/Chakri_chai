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
Route::post('/create_company','CompanyController@create_company')->middleware('auth');
Route::post('/company_panel','CompanyController@company_panel')->middleware(['auth','auth.company']);
Route::get('/company_panel','CompanyController@company_panel')->middleware(['auth','auth.company']);

//myController
Route::get('/user_panel','myController@user_panel')->middleware('auth');
Route::post('/upload_cv','myController@upload_cv')->name('upload')->middleware('auth');; //name means set route name for calling

//CircularController
Route::post('/create_circular','CircularController@create_circular')->middleware(['auth','auth.company']);;
Route::get('/update_circular/{cir_id}','CircularController@update_circular')->middleware(['auth','auth.company']);;
Route::get('/visibility/{cir_id}/{show_sts}','CircularController@visibility_circular')->middleware(['auth','auth.company']);;
Route::get('/edit_circular/{cir_id}','CircularController@edit_circular')->middleware(['auth','auth.company']);;
Route::get('/circular_details/{cir_id}','CircularController@circular_details')->middleware('auth');

//ApplicationController
Route::get('/apply/{c_id}/{cir_id}','ApplicationController@apply')->middleware(['auth','auth.apply']);
Route::get('/applicants_details/{cir_id}/{c_name}/{j_title}','ApplicationController@applicants_details')->middleware('auth');



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