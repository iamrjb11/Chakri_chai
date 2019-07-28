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
class myController extends Controller

{
    
    public function home(){
        $host_url=url()->current();
        //echo $host_url;
            
        Session::put('host_name',$host_url);
        //echo Session::get('host_name');
        Session::put('header_code','1');
        $circulars = DB::select("select * from tbl_circular_info inner join companies on tbl_circular_info.c_id=companies.id  order by cir_id DESC ");
        //echo"<pre>";
        //print_r($circulars);
        return view('home_page',array('circulars'=>$circulars));
    }
    public function upload_cv(Request $request){
        $u_id = Auth::user()->id;
        if( $file = $request->file('my_cv') ){
            $file_name = $file->getClientOriginalName();
            $file->storeAs('public/my_cv_folder',$file_name);

            DB::update("update users set filename='$file_name' where id='$u_id' ");
            
            return redirect('/user_panel');
        }
        

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
        
        $u_id = Auth::user()->id;
        //echo Auth::user()->fullname;
        $c_id =  DB::select("select c_id from users where id='$u_id' ");
        $c_id = $c_id[0]->c_id;
        // $c_id = Session::get('c_id');
        //$c_id = $c_details[0]->c_id;
        
        
        $c_name = DB::select("select name from companies where id='$c_id' ");
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
    public function user_panel(){
        
        $u_id = Auth::user()->id;
        $u_name = Auth::user()->fullname;
        //echo Auth::user()->fullname;
        // $c_id =  DB::select("select c_id from users where id='$u_id' ");
        // $c_id = $c_id[0]->c_id;
        // // $c_id = Session::get('c_id');
        // //$c_id = $c_details[0]->c_id;
        
        
        // $c_name = DB::select("select name from companies where id='$c_id' ");
        // $circulars = DB::select("select * from tbl_circular_info where c_id='$c_id' order by cir_id DESC ");
        
        //$data = compact("circulars","c_name");
        //$data=array('circulars'=>$circulars,'c_name'=>$c_name);
        //print_r($data);

        //echo "<br>Name : ".$c_name[0]->c_name;
        //use array function
        //echo gettype($circulars);
        //return view('company_panel',array('cir_id'=>0,'circulars'=>$circulars,'c_name'=>$c_name) );
        $file_name = DB::select("select filename from users where id='$u_id' ");
        $file = $file_name[0]->filename;
        return view('user_panel',array('u_name'=>$u_name,'file'=>$file) );
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
        $u_email = $request->input('u_email');
        $u_password = $request->input('u_password');
        //echo $c_name."<br> ".$u_email."<br> ".$u_password;

        DB::insert("insert into companies (name) values('$c_name') ");
        $c_id = DB::select("select id from companies where name='$c_name' ");
        $c_id = $c_id[0]->id;

        
        $u_id = DB::select("select id from users where email='$u_email' ");
        if($u_id){
            $u_id = $u_id[0]->id;
            DB::update("update users set c_id=? where id=? ",[$c_id,$u_id]);
            DB::update("update role_user set role_id='2' where user_id=? ",[$u_id]);
            
            //return back()->with('success','Image Upload successfully');   
            
            return redirect('/register');
        }
        else {
            return "Error!";
        }
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
        $u_id = Auth::user()->id;
        //echo Auth::user()->fullname;
        $c_id =  DB::select("select c_id from users where id='$u_id' ");
        $c_id = $c_id[0]->c_id;
        
        $c_name = DB::select("select name from companies where id='$c_id' ");
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
        return redirect('/panel');


    }
    public function circular_details($cir_id){
        //echo $cir_id;
        
        $u_id = Auth::user()->id;

        $details = DB::select("select * from tbl_circular_info left join companies on tbl_circular_info.c_id=companies.id where tbl_circular_info.cir_id='$cir_id' ");
        
        $check = DB::select("select * from applications where cir_id=? and u_id=?",[$cir_id,$u_id]);
        if($check)
            $sts = "yes";
        else
            $sts = "no";
        //echo $sts;

        return view('circular_details',array('details'=>$details,'apply_sts'=>$sts));
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
}
