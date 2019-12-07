<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use DB;
use Illuminate\Http\UploadedFile;
use Session;

class ProductController extends Controller
{
    public function index()
    {
        $this->AdminCheckAuth();
        $products = DB::table('products')
                    ->join('categories','product_category_id','=','categories.category_id')
                    ->join('brands','product_brand_id','=','brands.brand_id')
                    ->select('products.*','categories.*','brands.*')
                    ->get();

        return view('backend.products.index',compact('products'));
    }


    public function create()
    {
        $this->AdminCheckAuth();
        $find_category = DB::table('categories')->get();
        $find_brand = DB::table('brands')->get();

        return view('backend.products.add',compact('find_category'),compact('find_brand'));
    }

    public function store(Request $request)
    {
        $this->AdminCheckAuth();
        $product = new \App\Product ;

        //validate form data field
        $validatedData = $request->validate([
            'product_title' => 'required',
            'product_subtitle' => 'required',
            'product_category_id' => 'required',
            'product_brand_id' => 'required',
            'long_description' => 'required',
            'short_description' => 'required',
            'product_quantity' => 'required',
            'price' => 'required',
            'product_status' => 'required',     
        ]);
        

        $product->product_title = request('product_title');
        $product->product_subtitle = request('product_subtitle');
        $product->product_category_id = request('product_category_id');
        $product->product_brand_id = request('product_brand_id');
        $product->long_description = request('long_description');
        $product->short_description = request('short_description');
        $product->product_quantity = request('product_quantity');
        $product->price = request('price');
        $product->product_status = request('product_status');
        
        $file = $request->file('product_image');
        if($file){
            $filename = 'product_image-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('media',$filename);
            $product->product_image = $path ;
        }

        //$file = $request->file('product_image');

        // generate a new filename. getClientOriginalExtension() for the file extension
        //$filename = 'product_image-' . time() . '.' . $file->getClientOriginalExtension();

        // save to storage/app/photos as the new $filename
        //$path = $file->storeAs('public', $filename);

        // Making the string data as url from laravel storage :)
        //$product->product_image = $path ;

        //Upload image
        /*$image = $request->file('product_image');
        if($image){
            $image_name = str_random(20);
            $ext = strtolower($image->getClientOrginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path='media/product';
            $image_url = $upload_path.$image_full_name ;
            $success = $image->move($upload_path,$image_full_name) ;
            if(success){
                $product->product_image = $image_url;
                return redirect('/dashboard/products');
            }
        }
        */

        $product->save();

        return redirect('/dashboard/products') ;

        
    }



    public function edit($product_id)
    {
        $this->AdminCheckAuth();
        $find_category = DB::table('categories')->get();
        $find_brand = DB::table('brands')->get();

        $find_product = \App\Product::findOrFail($product_id) ;
        return view('backend.products.edit_product',compact('find_product','find_category','find_brand'));
    }


    public function update(Request $request,$product_id)
    {
        $this->AdminCheckAuth();
        $find_product = \App\Product::findOrFail($product_id) ;
        //validate form data field
        $validatedData = $request->validate([
            'product_title' => 'required',
            'product_subtitle' => 'required',
            'product_category_id' => 'required',
            'product_brand_id' => 'required',
            'long_description' => 'required',
            'short_description' => 'required',
            'product_quantity' => 'required',
            'price' => 'required',
        ]);
        

        $find_product->product_title = request('product_title');
        $find_product->product_subtitle = request('product_subtitle');
        $find_product->product_category_id = request('product_category_id');
        $find_product->product_brand_id = request('product_brand_id');
        $find_product->long_description = request('long_description');
        $find_product->short_description = request('short_description');
        $find_product->product_quantity = request('product_quantity');
        $find_product->price = request('price');
        $find_product->product_image = request('product_image');

        $find_product->save();

        return redirect('/dashboard/products') ;
    }

 
    public function destroy($product_id)
    {
        $this->AdminCheckAuth();
        $find_product = \App\Product::findOrFail($product_id) ;
        $find_product->delete();
        return redirect('/dashboard/products');
    }

    public function inactive($product_id)
    {
        $this->AdminCheckAuth();
        DB::table('products')
            ->where('product_id',$product_id)
            ->update(['product_status'=> '0']);

        return redirect('/dashboard/products');
    }

    public function active($product_id)
    {
        $this->AdminCheckAuth();
        DB::table('products')
            ->where('product_id',$product_id)
            ->update(['product_status'=> '1']);

        return redirect('/dashboard/products');
    }

     // This function used to authenticate admin and to secured system.
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
