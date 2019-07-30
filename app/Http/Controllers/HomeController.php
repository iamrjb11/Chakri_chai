<?php

namespace App\Http\Controllers;
use App\User;


use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // to use Database (DB::select("query"))
use Illuminate\Support\Facades\Input; //to use this Input::get('tag')
use Illuminate\Support\Facades\Redirect; // to use this Redirect::to('url')
use App\Application;
use Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function index(){
        $host_url=url()->current();
        //echo $host_url;
            
        Session::put('host_name',$host_url);
        //echo Session::get('host_name');
        Session::put('header_code','1');
        $circulars = DB::select("select circulars.id as cir_id,companies.id as c_id,name,job_title,job_location,job_experience,deadline from circulars inner join companies on circulars.c_id=companies.id where visibility='1' order by circulars.id DESC ");
        //$circulars=null;
        //echo"<pre>";
        //print_r($circulars);
        return view('home_page',array('circulars'=>$circulars));
    }
    
}
