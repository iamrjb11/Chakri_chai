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
Route::get('/','myController@home');
Route::get('/signup', function () {
    //echo Session::get('host_name');
    Session::put('header_code','2');
    return view('sing_up');
});
Route::get('/r', function () {
    //echo Session::get('host_name');
    Session::put('header_code','3');
    return view('welcome');
});
Route::post('/panel','myController@company_panel')->middleware(['auth','auth.company']);;

Route::get('/panel','myController@company_panel')->middleware(['auth','auth.company']);;
Route::get('/user_panel','myController@user_panel')->middleware('auth');;

Route::get('/delete_circular/{cir_id}','myController@delete_circular');
Route::get('/edit_circular/{cir_id}','myController@edit_circular');
Route::get('/circular_details/{cir_id}','myController@circular_details')->middleware('auth');


//POST METHODS
Route::post('/login_user','myController@login_user');
Route::post('/login_company','myController@login_company');

Route::post('/signup_user','myController@signup_user');
Route::post('/signup_company','myController@signup_company');
Route::post('/create_circular','myController@create_circular');
Route::get('/update_circular/{cir_id}','myController@update_circular');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
