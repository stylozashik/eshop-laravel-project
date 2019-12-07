<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Cart;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    public function payment(){
        $cart_details = Cart::content();
        $cart_total = Cart::total();
        $cart_subtotal = Cart::subtotal();
        $cal_tax = Cart::tax();

        if(Session::get('customer_id') != NULL && Session::get('s_id') != NUll){
            if($cart_total <= 0){
                return redirect('/shop');
            }
            return view('frontend.pages.payment',compact('cart_details','cart_total','cart_subtotal','cal_tax'));
        }
        elseif(Session::get('customer_id') != NULL && Session::get('s_id') == NUll){
            if($cart_total <= 0){
                return redirect('/shop');
            }
            return redirect('/checkout');
        }
        else
            return redirect('/login-check');
    }

    public function confirm_order(Request $request){
        $odata = array();
        $customer_id = Session::get('customer_id');
        $shipping_id = Session::get('s_id');
        $cart_total = Cart::total();
        if($request->payment_method == 1 ){
            $odata['customer_id'] = $customer_id ;
            $odata['shipping_id'] = $shipping_id ;
            $odata['payment_id'] = 1 ;
            $odata['order_total'] = $cart_total ;
            $odata['order_status'] = "Pending" ;

            $date_time = now();
            $odata['order_date'] = date_format($date_time,"d/m/Y");
            $odata['order_time'] = date_format($date_time,"H:i:s");

            $order_id = DB::table('Orders')
                        ->insertGetId($odata);
            Session::put('order_id',$order_id);

            // Inserting data on order_details table
            $data = array();
            $context = Cart::content();

            foreach($context as $v_context){
                $data['order_id'] =  $order_id ;
                $data['product_id'] = $v_context->id ;
                $data['product_name'] = $v_context->name ;
                $data['product_price'] = $v_context->price ;
                $data['product_quantity'] = $v_context->qty ;
                $order_details_id = DB::table('OrderDetails')
                                    ->insertGetId($data);
            }
            Cart::destroy();
            return redirect('/congratulations');

        }
        elseif($request->payment_method == 2 ){
            dd('Bank Transfer will avail soon...');
        }
        elseif($request->payment_method == 3 ){
            dd('Paypal payment will avail soon...');
        }
    }

    public function congratulations(){
        return view('frontend.pages.congratulations');
    }

    public function orders_view(){
        $obj = new SuperAdminController();
        $obj->AdminCheckAuth();
        $orders_data = DB::table('orders')
                    ->join('customers','customers.customer_id','=','orders.customer_id')
                    ->select('orders.*','customers.*')
                    ->get();
        
        return view('backend.orders.orders_view',compact('orders_data'));
    }

    public function inactive($order_id)
    {
        $obj = new SuperAdminController();
        $obj->AdminCheckAuth();
        DB::table('orders')
            ->where('order_id',$order_id)
            ->update(['order_status'=> 'Pending']);

        return redirect('/dashboard/orders');
    }

    public function active($order_id)
    {
        $obj = new SuperAdminController();
        $obj->AdminCheckAuth();
        DB::table('orders')
            ->where('order_id',$order_id)
            ->update(['order_status'=> 'Delivered']);

        return redirect('/dashboard/orders');
    }

     public function detail_view($order_id){
        $obj = new SuperAdminController();
        $obj->AdminCheckAuth();

        $order_details = DB::table('orderdetails')
                            ->join('orders','orders.order_id','=','orderdetails.order_id')
                            ->join('products','products.product_id','=','orderdetails.product_id')
                            ->select('orderdetails.*','orders.*','products.product_image','products.product_title','products.product_status','products.price')
                            ->where('orders.order_id','=',$order_id)
                            ->get();
                            //dd($order_details);

         return view('backend.orders.details',compact('order_details','order_id'));
     }

}
