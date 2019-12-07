<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Cart;

class CartController extends Controller
{
    public function add_to_cart(Request $request){

        $product_quantity = $request->product_quantity ;
        $product_id = $request->product_id ;

        $order_information = DB::table('products')
                                ->where('product_id', $product_id)
                                ->first();
        
        $data['id'] = $product_id;
        $data['name'] = $order_information->product_title;
        $data['qty'] = $product_quantity;
        $data['price'] = $order_information->price;
        $data['weight'] = 00;
        $data['options']['image'] = $order_information->product_image;

        Cart::add($data);


        return redirect('/cart/show'); 

    }

    public function show_cart(){

        $cart_details = Cart::content();
        $cart_total = Cart::total();
        $cart_subtotal = Cart::subtotal();
        $cal_tax = Cart::tax();
        //dd($cart_details);
        //dd($cart_details->first()->options->first());
        return view('frontend.show_cart',compact('cart_details','cart_total','cart_subtotal','cal_tax'));
    }

    public function delete_cart($rowId){
        Cart::update($rowId,0);
        return redirect('/cart/show');
    }

    public function update_cart(Request $request){
        $qty = $request->qty;
        $rowId = $request->update;

        Cart::update($rowId,$qty);
        return redirect('cart/show/');
    }

}
