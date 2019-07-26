<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // to use Database (DB::select("query"))
use Illuminate\Support\Facades\Input; //to use this Input::get('tag')
use Illuminate\Support\Facades\Redirect; // to use this Redirect::to('url')

class myController extends Controller
{
    public function login_user(Request $request){


    }
    public function login_conpany(Request $request){


    }
    public function signup_user(Request $request){
        $u_name = $request->input('u_name');
        $u_email = $request->input('u_email');
        $u_password = $request->input('u_password');

        DB::insert("insert into users (u_name,u_email,u_password) values(?,?,?)",[$u_name,$u_email,$u_password] );
        //return back()->with('success','Image Upload successfully');   
        return view('home');

    }
    public function signup_company(Request $request){
        

        $c_name = $request->input('c_name');
        $c_email = $request->input('c_email');
        $c_password = $request->input('c_password');

        DB::insert("insert into tbl_company_info (c_name,c_email,c_password) values(?,?,?)",[$c_name,$c_email,$c_password] );
        //return back()->with('success','Image Upload successfully');   
        return view('home');
    }
}
