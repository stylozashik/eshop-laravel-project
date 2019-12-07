<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Cart;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

class DeliveryController extends Controller
{
    public function index(){
        $this->AdminCheckAuth();
        $orders_data = DB::table('orders')
                    ->join('customers','customers.customer_id','=','orders.customer_id')
                    ->select('orders.*','customers.*')
                    ->get();
        
        return view('backend.delivery.index',compact('orders_data'));
    }

    public function AdminCheckAuth()
    {
        $id = Session::get('admin_id');
        if($id){
            return;
        }else{
            return redirect('/admin-login')->send();
        }
    }

}
