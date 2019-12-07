<?php

namespace App\Http\Controllers;

use DB;
use App\brand;
use Illuminate\Http\Request;
use Session;

class BrandController extends Controller
{
    public function index()
    {
        $this->AdminCheckAuth();
        $brand = brand::all();
        return view('backend.brands.index',compact('brand'));
    }


    public function create()
    {
        $this->AdminCheckAuth();
        return view('backend.brands.add_brand');
    }


    public function store(Request $request)
    {
        $this->AdminCheckAuth();
        $brand = new brand();

        $brand->title = request('title');
        $brand->subtitle = request('subtitle');
        $brand->origin = request('origin');
        $brand->brand_status = request('brand_status');
        $file = $request->file('brand_image');
        if($file){
            $filename = 'brand_image-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('media',$filename);
            $brand->brand_image = $path ;
        }

        $validatedData = $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'origin' => 'required',
            'brand_status' => 'required',
        ]);

        $brand->save();
        return redirect('dashboard/brands');
    }


    public function show(brand $brand)
    {
        //
    }


    public function edit($brand_id)
    {
        $this->AdminCheckAuth();
        $find_brand = \App\brand::findOrFail($brand_id) ;
        return view('backend.brands.edit_brand',compact('find_brand'));
    }


    public function update(Request $request, $brand_id)
    {
        $this->AdminCheckAuth();
        $find_brand = \App\brand::findOrFail($brand_id) ;
         // Passing form value for particular find by instantiating "category" model
         $find_brand->title=request('title');
         $find_brand->subtitle = request('subtitle');
         $find_brand->origin = request('origin');
         $file = $request->file('brand_image');
        if($file){
            $filename = 'brand_image-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('media',$filename);
            $find_brand->brand_image = $path ;
        }

         //validate form data field
        $validatedData = $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'origin' => 'required',
        ]);
 
         
         // Save those data in database
         $find_brand->save();
         
         // Redirect to the particular field
         return redirect('/dashboard/brands');
    }

  
    public function destroy($brand_id)
    {
        $this->AdminCheckAuth();
        $find_brand = \App\brand::findOrFail($brand_id) ;
        $find_brand->delete();

        return redirect('/dashboard/brands');
    }
    public function inactive($brand_id)
    {
        $this->AdminCheckAuth();
        DB::table('brands')
            ->where('brand_id',$brand_id)
            ->update(['brand_status'=> '0']);

        return redirect('/dashboard/brands');
    }

    public function active($brand_id)
    {
        $this->AdminCheckAuth();
        DB::table('brands')
            ->where('brand_id',$brand_id)
            ->update(['brand_status'=> '1']);

        return redirect('/dashboard/brands');
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
