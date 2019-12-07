<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;


class AdminController extends Controller
{
    //public function dashboard(){
       //return view('backend.dashboard');
    //}

    public function admin_login(){
        if(Session::get('admin_id')==null){
            return view('backend.login');
        }else{
            return redirect('/dashboard');
        }
        
    }

    public function dashboard_data(Request $request){
        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);

        $result = DB::table('tbl_admin')
                            ->where('admin_email',$admin_email)
                            ->where('admin_password',$admin_password)
                            ->first();

              if($result){
                  Session::put('admin_name',$result->admin_name);
                  Session::put('admin_id',$result->admin_id);
                  return Redirect::to('/dashboard');
              }else{
                  Session::put('message','Email or Password is Invalid!');
                  return Redirect::to('/admin-login');
              }



    }
}
