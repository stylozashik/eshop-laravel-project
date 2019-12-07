<?php

namespace App\Http\Controllers;

use App\category;
use Illuminate\Http\Request;
use DB;
use Session ;

class CategoryController extends Controller
{

    public function index()
    {
        $this->AdminCheckAuth();
        //$categories = DB::table('categories')->get();
        $categories = \App\category::all();

        return view('backend.categories.index',compact('categories'));
    }


    public function create()
    {
        $this->AdminCheckAuth();
        return view('backend.categories.add');
    }


    public function store(Request $request)
    {
        $this->AdminCheckAuth();
        // Declaring object
        $category = new \App\category ;

        // Passing form value for particular find by instantiating "category" model
        $category->category_name=request('category_name');
        $category->category_description = request('category_description');
        $category->category_status = request('category_status');
        $file = $request->file('category_image');
        if($file){
            $filename = 'category_image-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('media',$filename);
            $category->category_image = $path ;
        }


        //validate form data field
        $validatedData = $request->validate([
            'category_name' => 'required',
            'category_description' => 'required',
        ]);
        
        // Save those data in database
        $category->save();
        
        // Redirect to the particular field
        return redirect('/dashboard/categories');
    }


    public function show($category_id)
    {
        $this->AdminCheckAuth();
        $find_category = \App\category::findOrFail($category_id) ;
        return view('backend.categories.show',compact('find_category'));
    }

    public function edit($category_id)
    {
        $this->AdminCheckAuth();
        $find_category = \App\category::findOrFail($category_id) ;
        //$category = DB::table('categories')
         //              ->select('category_id')     
           //             ->get();
        return view('backend.categories.edit_category',compact('find_category'));
    }


    public function update(Request $request,$category_id)
    {
        $this->AdminCheckAuth();
        $find_category = \App\category::findOrFail($category_id) ;
         // Passing form value for particular find by instantiating "category" model
         $find_category->category_name=request('category_name');
         $find_category->category_description = request('category_description');
         $find_category->category_image = request('category_image');

         //validate form data field
        $validatedData = $request->validate([
            'category_name' => 'required',
            'category_description' => 'required',
        ]);
 
         
         // Save those data in database
         $find_category->save();
         
         // Redirect to the particular field
         return redirect('/dashboard/categories');
    }


    public function destroy($category_id)
    {
        $this->AdminCheckAuth();
        $find_category = \App\category::findOrFail($category_id) ;
        $find_category->delete();

        return redirect('/dashboard/categories');
    }

    public function inactive($category_id)
    {
        $this->AdminCheckAuth();
        DB::table('categories')
            ->where('category_id',$category_id)
            ->update(['category_status'=> '0']);

        return redirect('/dashboard/categories');
    }

    public function active($category_id)
    {
        $this->AdminCheckAuth();
        DB::table('categories')
            ->where('category_id',$category_id)
            ->update(['category_status'=> '1']);

        return redirect('/dashboard/categories');
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
