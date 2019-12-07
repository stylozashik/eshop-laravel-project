<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;

class SuperAdminController extends Controller
{
    public function logout(){
        //Session::put('admin_name',null);
        //Session::put('admin_id',null);
        Session::flush();
        return Redirect::to('/admin-login');

    }

    public function index(){
        $this->AdminCheckAuth();
        $products = \App\product::all();
        $categories = \App\category::all();
        $brands = \App\brand::all();
        return view('backend.dashboard',compact('products','categories','brands'));
    }

    public function AdminCheckAuth(){
        $id = Session::get('admin_id');
        if($id){
            return;
        }else{
            return redirect('/admin-login')->send();
        }
    }

}
