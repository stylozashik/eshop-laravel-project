<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    public function index(){
        $category = \App\category::all();
        $brands = \App\brand::all();
        $products = DB::table('products')
                    ->join('categories','categories.category_id','=','products.product_category_id')
                    ->join('brands','brands.brand_id','=','products.product_brand_id')
                    ->select('products.*','categories.*','brands.*')
                    ->get();


        $cat_tab = DB::table('products')
                    ->join('categories','categories.category_id','=','products.product_category_id')
                    ->select('products.*','categories.*')
                    ->get();


        //dd($cat_tab->first()->category_id);

        $count_brand = $brands->count();
                    

    	return view('frontend.home_new',compact('category','brands','count_brand','products','cat_tab'));
    }

    public function shop(){
        $category = \App\category::all();
        $brands = \App\brand::all();
        $products = DB::table('products')
                    ->join('categories','categories.category_id','=','products.product_category_id')
                    ->join('brands','brands.brand_id','=','products.product_brand_id')
                    ->select('products.*','categories.*','brands.*')
                    ->get();


        $cat_tab = DB::table('products')
                    ->join('categories','categories.category_id','=','products.product_category_id')
                    ->select('products.*','categories.*')
                    ->get();


        //dd($cat_tab->first()->category_id);

        $count_brand = $brands->count();
                    

    	return view('frontend.pages.shop',compact('category','brands','count_brand','products','cat_tab'));
    }

    public function category_products($category_id){
        $category = \App\category::all();
        $brands = \App\brand::all();
        $products_cat = DB::table('products')
                        ->join('categories','categories.category_id','=','products.product_category_id')
                        ->join('brands','brands.brand_id','=','products.product_brand_id')
                        ->select('products.*','categories.category_name','brands.title')
                        ->where('category_id',$category_id)
                        ->get();

        return view('frontend.pages.show_category',compact('products_cat','category','brands'));
    }
    public function brand_products($brand_id){
        $category = \App\category::all();
        $brands = \App\brand::all();
        $products_brand = DB::table('products')
                        ->join('categories','categories.category_id','=','products.product_category_id')
                        ->join('brands','brands.brand_id','=','products.product_brand_id')
                        ->select('products.*','categories.category_name','brands.title')
                        ->where('brand_id',$brand_id)
                        ->get();

        return view('frontend.pages.show_brands',compact('products_brand','category','brands'));
    }

    public function product_details($product_id){
        $category = \App\category::all();
        $brands = \App\brand::all();
        $category_info = DB::table('products')
                        ->join('categories','categories.category_id','=','products.product_category_id')
                        ->select('products.*','categories.*')
                        ->where('product_id','=',$product_id)
                        ->get();

        $find_product = \App\Product::findOrFail($product_id);

       return view('frontend.pages.product_details',compact('find_product','category','brands','category_info'));
    }
}
