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



class ApplicationController extends Controller
{
    
    public function index()
    {
        
    }
    public function apply($cir_id){
        //echo "cir id : ".$cir_id;
        
        $u_id = Auth::user()->id;
        $apply = new Application;
        $apply->cir_id = $cir_id;
        $apply->u_id = $u_id;
        $apply->save();
        return redirect()->back();
    }
    
    public function applicants_details($cir_id,$c_name,$job_title)
    {
        //echo "cir id : ".$cir_id;
        $c_id = Auth::user()->c_id;

        $applicants_dtls = DB::select("SELECT * FROM applications INNER JOIN users on applications.u_id=users.id where cir_id='$cir_id' and applications.c_id='$c_id' ");
        return view('applicants_details',array('c_name'=>$c_name,'job_title'=>$job_title,'applicants_dtls'=>$applicants_dtls));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function show(Application $application)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Application  $appication
     * @return \Illuminate\Http\Response
     */
    public function edit(Application $application)
    {
        
    }

   
}
