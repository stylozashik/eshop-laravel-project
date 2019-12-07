<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use Cart;
use Illuminate\Support\Facades\Redirect;

class CheckoutController extends Controller
{

    public function login_check(){
        return view('frontend.pages.login');
    }

    public function customer_login(Request $request){

        $customer_email = $request->customer_email;
        $password = md5($request->password);
        
        $result = DB::table('customers')
                    ->where('customer_email',$customer_email)
                    ->where('password',$password)
                    ->first();
        if($result){
            Session::put('customer_id',$result->customer_id);
            return redirect('/checkout');
        }else{
            return redirect('/login-check');
        }
    }

    public function customer_registration(Request $request){
        
        $customer = array();
        $customer['customer_name'] = $request->customer_name;
        $customer['customer_email'] = $request->customer_email;
        $customer['password'] = md5($request->password);
        $customer['phone_number'] = $request->phone_number;

        $validatedData = $request->validate([
            'customer_name' => 'required',
            'customer_email' => 'required',
            'password' => 'required',
            'phone_number' => 'required',
        ]);

        //$customer->save();

        $customer_id = DB::table('Customers')
                        ->insertGetId($customer);
        
        
        Session::put('customer_id',$customer_id);
        Session::put('customer_name',$request->customer_name);

        return redirect('/checkout');

    }

    public function checkout(){

        $cart_total = Cart::total();
        if(Session::get('customer_id') != NULL && Session::get('s_id') != NUll){
            if($cart_total <= 0){
                return redirect('/shop');
            }
          return redirect('/payment');
        }
        elseif(Session::get('customer_id') != NULL && Session::get('s_id') == NUll){
            if($cart_total <= 0){
                return redirect('/shop');
            }
            return view('frontend.pages.checkout');
        }
        else
            return redirect('/login-check');
        
    }

    public function customer_logout(){
        Session::flush();
        return Redirect::to('/');

    }

    public function complete_order(Request $request){
        $data = array();

        $data['customer_id'] = $request->customer_id ;
        $data['s_first_name'] = $request->s_first_name ;
        $data['s_last_name'] = $request->s_last_name ;
        $data['s_address_1'] = $request->s_address_1 ;
        $data['s_address_2'] = $request->s_address_2 ;
        $data['s_phone'] = $request->s_phone ;
        $data['s_email'] = $request->s_email ;
        $data['s_delivery_status'] = $request->s_delivery_status ;

        $validatedData = $request->validate([
            'customer_id' => 'required',
            's_first_name' => 'required',
            's_last_name' => 'required',
            's_address_1' => 'required',
            's_phone' => 'required',
            's_email' => 'required',
        ]);

        $s_id = DB::table('shippings')
                ->insertGetId($data);
        Session::put('s_id',$s_id);

        return redirect('/payment');
    }


}
