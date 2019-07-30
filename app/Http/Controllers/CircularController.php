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
        $job_vacancy = $request->input('job_vacancy');
        $salary = $request->input('salary');
        $experience = $request->input('experience');
        $job_description = $request->input('job_description');
        $educational_info = $request->input('educational_info');
        $location = $request->input('location');
        $country = $request->input('country');
        $deadline = $request->input('deadline');

        DB::insert("insert into circulars (c_id,job_title,job_vacancy,job_description,educational_info,job_salary,job_experience,job_location,job_country,deadline,visibility) values(?,?,?,?,?,?,?,?,?,?,?)",[$c_id,$job_title,$job_vacancy,$job_description,$educational_info,$salary,$experience,$location,$country,$deadline,'1'] );
        //return back()->with('success','Image Upload successfully');   
        
        return redirect('/company_panel');

    }
    public function visibility_circular($cir_id,$show_sts){
        if($show_sts == 1)
            DB::update("update circulars set visibility='0' where id='$cir_id'  ");
        else
            DB::update("update circulars set visibility='1' where id='$cir_id'  ");
        return redirect('/company_panel');
    }
   
    public function edit_circular($cir_id){ 
        $u_id = Auth::user()->id;
        //echo Auth::user()->fullname;
        $c_id =  DB::select("select c_id from users where id='$u_id' ");
        $c_id = $c_id[0]->c_id;
        
        $c_name = DB::select("select name from companies where id='$c_id' ");
        $circulars = DB::select("select * from circulars where c_id='$c_id' order by id DESC ");
        $edit_data = DB::select("select * from circulars where id='$cir_id'  ");
        $applications = DB::select("SELECT job_title,deadline,cir_id,COUNT(cir_id) as numOf FROM applications INNER JOIN circulars on applications.cir_id=circulars.id where applications.c_id='$c_id' GROUP BY cir_id");
        
        return view('company_panel',array('circular_id'=>$cir_id,'circulars'=>$circulars,'c_name'=>$c_name,'edit_data'=>$edit_data,'applications'=>$applications ) );  ;
        // foreach ($array as $arr) {
        //     echo $arr."  ";
        // }
    }

    public function update_circular(Request $request,$cir_id){

        //echo "Edit : ".$request->job_title;
        
        $job_title = $request->job_title;  
        $job_vacancy = $request->job_vacancy;
        $educational_info = $request->educational_info; 
        $experience = $request->experience;
        $salary = $request->salary;
        $job_description = $request->job_description;
        $location = $request->location;
        $country = $request->country;
        $deadline = $request->deadline;

        DB::update("update  circulars set job_title=?,job_vacancy=?,job_description=?,educational_info=?,job_salary=?,job_experience=?,job_location=?,job_country=?,deadline=? where id=?",[$job_title,$job_vacancy,$job_description,$educational_info,$salary,$experience,$location,$country,$deadline,$cir_id] );
        //return back()->with('success','Image Upload successfully');   
        Session::put('header_code','3');
        return redirect('/company_panel');


    }
    public function circular_details($cir_id){
        //echo $cir_id;
        
        $u_id = Auth::user()->id;

        $details = DB::select("select circulars.id as cir_id,companies.id as c_id,job_title,job_vacancy,job_experience,name,educational_info,job_description,job_location,job_country,job_salary,deadline from circulars left join companies on circulars.c_id=companies.id where circulars.id='$cir_id' ");
        
        $check = DB::select("select * from applications where cir_id=? and u_id=?",[$cir_id,$u_id]);
        if($check)
            $sts = "yes";
        else
            $sts = "no";
        //echo $sts;

        return view('circular_details',array('details'=>$details,'apply_sts'=>$sts));
    }
}
