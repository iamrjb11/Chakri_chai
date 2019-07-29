<?php

namespace App\Http\Controllers;

use App\Circular;
use App\User;


use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // to use Database (DB::select("query"))
use Illuminate\Support\Facades\Input; //to use this Input::get('tag')
use Illuminate\Support\Facades\Redirect; // to use this Redirect::to('url')

use Auth;

class CircularController extends Controller
{
    
    public function index()
    {
        
    }

    public function create_circular(Request $request){
        $c_id = Auth::user()->c_id;
        
        $job_title = $request->input('job_title');
        $salary = $request->input('salary');
        $job_description = $request->input('job_description');
        $location = $request->input('location');
        $country = $request->input('country');
        $deadline = $request->input('deadline');

        DB::insert("insert into circulars (c_id,job_title,job_description,job_salary,job_location,job_country,deadline) values(?,?,?,?,?,?,?)",[$c_id,$job_title,$job_description,$salary,$location,$country,$deadline] );
        //return back()->with('success','Image Upload successfully');   
        
        return redirect('/company_panel');

    }
    public function delete_circular($cir_id){
        echo "Delete : ".$cir_id;
    }
   
    public function edit_circular($cir_id){ 
        $u_id = Auth::user()->id;
        //echo Auth::user()->fullname;
        $c_id =  DB::select("select c_id from users where id='$u_id' ");
        $c_id = $c_id[0]->c_id;
        
        $c_name = DB::select("select name from companies where id='$c_id' ");
        $circulars = DB::select("select * from circulars where c_id='$c_id' order by id DESC ");
        $edit_data = DB::select("select * from circulars where id='$cir_id'  ");
        return view('company_panel',array('cir_id'=>$cir_id,'circulars'=>$circulars,'c_name'=>$c_name,'edit_data'=>$edit_data ) );  ;
        // foreach ($array as $arr) {
        //     echo $arr."  ";
        // }
    }

    public function update_circular(Request $request,$cir_id){

        echo "Edit : ".$request->job_title;
        
        $job_title = $request->job_title;
        $salary = $request->salary;
        $job_description = $request->job_description;
        $location = $request->location;
        $country = $request->country;
        $deadline = $request->deadline;

        DB::update("update  circulars set job_title=?,job_description=?,job_salary=?,job_location=?,job_country=?,deadline=? where id=?",[$job_title,$job_description,$salary,$location,$country,$deadline,$cir_id] );
        //return back()->with('success','Image Upload successfully');   
        Session::put('header_code','3');
        return redirect('/company_panel');


    }
    public function circular_details($cir_id){
        //echo $cir_id;
        
        $u_id = Auth::user()->id;

        $details = DB::select("select circulars.id as cir_id,job_title,name,job_description,job_location,job_country,job_salary,deadline from circulars left join companies on circulars.c_id=companies.id where circulars.id='$cir_id' ");
        
        $check = DB::select("select * from applications where cir_id=? and u_id=?",[$cir_id,$u_id]);
        if($check)
            $sts = "yes";
        else
            $sts = "no";
        //echo $sts;

        return view('circular_details',array('details'=>$details,'apply_sts'=>$sts));
    }
}
