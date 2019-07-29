<?php

namespace App\Http\Controllers;
use App\User;


use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // to use Database (DB::select("query"))
use Illuminate\Support\Facades\Input; //to use this Input::get('tag')
use Illuminate\Support\Facades\Redirect; // to use this Redirect::to('url')

use Auth;
use App\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function company_panel(){
        
        
        $u_id = Auth::user()->id;
        //echo Auth::user()->fullname;
        
        $c_id = Auth::user()->c_id;

        // $c_id = Session::get('c_id');
        //$c_id = $c_details[0]->c_id;
        
        
        $c_name = DB::select("select name from companies where id='$c_id' ");
        $circulars = DB::select("select * from circulars where c_id='$c_id' order by id DESC ");
        $applications = DB::select("SELECT job_title,deadline,cir_id,COUNT(cir_id) as numOf FROM applications INNER JOIN circulars on applications.cir_id=circulars.id where applications.c_id='$c_id' GROUP BY cir_id");
        //$data = compact("circulars","c_name");
        //$data=array('circulars'=>$circulars,'c_name'=>$c_name);
        //print_r($data);

        //echo "<br>Name : ".$c_name[0]->c_name;
        //use array function
        //echo gettype($circulars);
        //$cir_id=0;
        return view('company_panel',array('circular_id'=>0 ,'circulars'=>$circulars,'c_name'=>$c_name,'applications'=>$applications) );
        //use compact function
        //return view('company_panel',);
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
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }
}
