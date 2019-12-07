<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CustomerController extends Controller
{
    public function customer_view(){
        $customers = DB::table('customers')->get();

        return view('backend.customers.index',compact('customers'));
    }

}
