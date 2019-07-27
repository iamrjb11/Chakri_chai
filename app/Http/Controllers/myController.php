<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // to use Database (DB::select("query"))
use Illuminate\Support\Facades\Input; //to use this Input::get('tag')
use Illuminate\Support\Facades\Redirect; // to use this Redirect::to('url')

class myController extends Controller

{
    
    public function home(){
        $host_url=url()->current();
        //echo $host_url;
            
        Session::put('host_name',$host_url);
        //echo Session::get('host_name');
        Session::put('header_code','1');
        $circulars = DB::select("select * from tbl_circular_info inner join tbl_company_info on tbl_circular_info.c_id=tbl_company_info.c_id  order by cir_id DESC ");
        //echo"<pre>";
        //print_r($circulars);
        return view('home_page',array('circulars'=>$circulars));
    }
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
    public function company_info(){
        $c_id = Session::get('c_id');
        
        $c_name = DB::select("select c_name from tbl_company_info where c_id='$c_id' ");
        $circulars = DB::select("select * from tbl_circular_info where c_id='$c_id' order by cir_id DESC ");
        

        return array('c_name'=>$c_name,'circulars'=>$circulars);
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
        //echo gettype($circulars);
        return view('company_panel',array('cir_id'=>0,'circulars'=>$circulars,'c_name'=>$c_name) );
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
        return view('home_page');

    }
    public function signup_company(Request $request){
        

        $c_name = $request->input('c_name');
        $c_email = $request->input('c_email');
        $c_password = $request->input('c_password');

        DB::insert("insert into tbl_company_info (c_name,c_email,c_password) values(?,?,?)",[$c_name,$c_email,$c_password] );
        //return back()->with('success','Image Upload successfully');   
        Session::put('header_code','1');
        return view('home_page');
    }
    public function create_circular(Request $request){
        $c_id = Session::get('c_id');
        $job_title = $request->input('job_title');
        $salary = $request->input('salary');
        $job_description = $request->input('job_description');
        $location = $request->input('location');
        $country = $request->input('country');
        $deadline = $request->input('deadline');

        DB::insert("insert into tbl_circular_info (c_id,job_title,job_description,job_salary,job_location,job_country,deadline) values(?,?,?,?,?,?,?)",[$c_id,$job_title,$job_description,$salary,$location,$country,$deadline] );
        //return back()->with('success','Image Upload successfully');   
        Session::put('header_code','3');
        return redirect('/company_panel');

    }
    public function delete_circular($cir_id){
        echo "Delete : ".$cir_id;
    }
   
    public function edit_circular($cir_id){ 
        //echo "COOL : ".$array;
        //echo "Edit : ".$cir_id;
        $c_id = Session::get('c_id');
        
        $c_name = DB::select("select c_name from tbl_company_info where c_id='$c_id' ");
        $circulars = DB::select("select * from tbl_circular_info where c_id='$c_id' order by cir_id DESC ");
        $edit_data = DB::select("select * from tbl_circular_info where cir_id='$cir_id'  ");
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

        DB::update("update  tbl_circular_info set job_title=?,job_description=?,job_salary=?,job_location=?,job_country=?,deadline=? where cir_id=?",[$job_title,$job_description,$salary,$location,$country,$deadline,$cir_id] );
        //return back()->with('success','Image Upload successfully');   
        Session::put('header_code','3');
        return redirect('/company_panel');


    }
    public function circular_details($cir_id){
        //echo $cir_id;
        $details = DB::select("select * from tbl_circular_info left join tbl_company_info on tbl_circular_info.c_id=tbl_company_info.c_id where tbl_circular_info.cir_id='$cir_id' ");


        return view('circular_details',array('details'=>$details));
    }
}
