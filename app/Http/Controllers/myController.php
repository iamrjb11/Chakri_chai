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
    
    
    public function upload_cv(Request $request){
        $u_id = Auth::user()->id;
        if( $file = $request->file('my_cv') ){
            $file_name = $file->getClientOriginalName();
            $file->storeAs('public/my_cv_folder',$file_name);

            DB::update("update users set filename='$file_name' where id='$u_id' ");
            
            return redirect()->back();
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
    
    
    
    
}


// public function signup_user(Request $request){
//     $u_name = $request->input('u_name');
//     $u_email = $request->input('u_email');
//     $u_password = $request->input('u_password');

//     DB::insert("insert into users (u_name,u_email,u_password) values(?,?,?)",[$u_name,$u_email,$u_password] );
//     //return back()->with('success','Image Upload successfully');   
//     Session::put('header_code','1');
//     return view('home_page');

// }