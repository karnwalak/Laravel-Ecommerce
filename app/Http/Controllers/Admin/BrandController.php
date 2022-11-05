<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
   
    public function index()
    {
        $brand = Brand::with('category')->orderBy('id','desc')->paginate(10);
        // return $brand;
        return view('layouts.admin.brand.index',compact('brand'));
    }
    
    
    public function create()
    {
        $category = Category::get(['id','name']);
        return view('layouts.admin.brand.create',compact('category'));
    }

    
    public function store(Request $request)
    {
        // return $request;
       $valid = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'category' => 'required|not_in:0'
       ]);

       $valid['status'] = $request->status == 'on' ? '1' : '0';
       $valid['category_id'] = $request->category;

       if(Brand::create($valid)){
          return redirect()->route('brands.index')->with('message','Brand Added!');
        }else{
           return redirect()->route('brands.index')->with('error','Brand Not Added!');
       }
    }

   
    public function edit($id)
    {
        $brand = Brand::find($id);
        $category = Category::get(['id','name']);
        return view('layouts.admin.brand.edit',compact('brand','category'));
    }

    
    public function update(Request $request, $id)
    {
        $valid = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'category' => 'required|not_in:0'
       ]);
       $brand = Brand::find($id);
       $brand->status = $request->status == 'on' ? '1' : '0';
       $brand->slug= $request->slug;
       $brand->name= $request->name;
       $brand->category_id = $request->category;

       if($brand->save()){
          return redirect()->route('brands.index')->with('message','Brand Updated!');
        }else{
           return redirect()->route('brands.index')->with('error','Brand Not Updated!');
       }
    }

    
    public function destroy(Request $request)
    {
        $res = Brand::find($request->pid);
        if($res->delete()){
            return redirect()->route('brands.index')->with('message','Brand Deleted Successfully!');
        }else{
            return redirect()->route('brands.index')->with('error','Brand Not Deleted!');
        }
    }
}
