<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // to use Database (DB::select("query"))
use Illuminate\Support\Facades\Input; //to use this Input::get('tag')
use Illuminate\Support\Facades\Redirect; // to use this Redirect::to('url')

class myController extends Controller
{
    public function login_user(Request $request){


    }
    public function login_company(Request $request){
        //echo "logged in";
        $c_email = $request->input('c_email');
        $c_password = $request->input('c_password');
        $data = DB::select("select * from tbl_company_info where c_email='$c_email' ");
        if($data){
        
            $request->session()->put('c_id',$data[0]->c_id);
            $request->session()->put('c_name',$data[0]->c_name);
            $c_id = $data[0]->c_id;
            //echo "<pre>";
            $retrieve_pass = $data[0]->c_password;
            //echo "</pre>";
            if(!empty($retrieve_pass)){
                if($c_password == $retrieve_pass){
                    //for check user logged in or not
                 
                    //echo "DONE";
                    return redirect('/company_panel');
                }
                
            }
            
        }   

    }
    public function company_panel(){
        $c_id = Session::get('c_id');
        
        $c_name = DB::select("select c_name from tbl_company_info where c_id='$c_id' ");
        $circulars = DB::select("select * from tbl_circular_info where c_id='$c_id' order by cir_id DESC ");
        
        //$data = compact("circulars","c_name");
        //$data=array('circulars'=>$circulars,'c_name'=>$c_name);
        //print_r($data);

        //echo "<br>Name : ".$c_name[0]->c_name;
        //use array function
        return view('company_panel',array('circulars'=>$circulars,'c_name'=>$c_name) );
        //use compact function
        //return view('company_panel',);
    }
    public function signup_user(Request $request){
        $u_name = $request->input('u_name');
        $u_email = $request->input('u_email');
        $u_password = $request->input('u_password');

        DB::insert("insert into users (u_name,u_email,u_password) values(?,?,?)",[$u_name,$u_email,$u_password] );
        //return back()->with('success','Image Upload successfully');   
        Session::put('header_code','1');
        return view('home');

    }
    public function signup_company(Request $request){
        

        $c_name = $request->input('c_name');
        $c_email = $request->input('c_email');
        $c_password = $request->input('c_password');

        DB::insert("insert into tbl_company_info (c_name,c_email,c_password) values(?,?,?)",[$c_name,$c_email,$c_password] );
        //return back()->with('success','Image Upload successfully');   
        Session::put('header_code','1');
        return view('home');
    }
    public function create_circular(Request $request){
        $c_id = Session::get('c_id');
        $job_title = $request->input('job_title');
        $salary = $request->input('salary');
        $job_description = $request->input('job_description');
        $location = $request->input('location');
        $country = $request->input('country');
        $deadline = $request->input('deadline');

        DB::insert("insert into tbl_circular_info (c_id,job_title,job_describtion,job_salary,job_location,job_country,deadline) values(?,?,?,?,?,?,?)",[$c_id,$job_title,$job_description,$salary,$location,$country,$deadline] );
        //return back()->with('success','Image Upload successfully');   
        Session::put('header_code','3');
        return redirect('/company_panel');

    }
    public function delete_circular($cir_id){
        echo "Delete : ".$cir_id;
    }
    public function edit_circular($cir_id){
        echo "Edit : ".$cir_id;
    }
}
