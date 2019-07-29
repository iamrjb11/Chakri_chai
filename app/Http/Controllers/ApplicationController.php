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
    
    public function create()
    {
        //
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
