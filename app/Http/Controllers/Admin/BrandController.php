<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
   
    public function index()
    {
        $brand = Brand::orderBy('id','desc')->paginate(10);
        return view('layouts.admin.brand.index',compact('brand'));
    }

   
    public function create()
    {
        return view('layouts.admin.brand.create');
    }

    
    public function store(Request $request)
    {
       $valid = $request->validate([
            'name' => 'required',
            'slug' => 'required'
       ]);

       $valid['status'] = $request->status == 'on' ? '1' : '0';

       if(Brand::create($valid)){
          return redirect()->route('brands.index')->with('message','Brand Added!');
        }else{
           return redirect()->route('brands.index')->with('error','Brand Not Added!');
       }
    }

   
    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('layouts.admin.brand.edit',compact('brand'));
    }

    
    public function update(Request $request, $id)
    {
        $valid = $request->validate([
            'name' => 'required',
            'slug' => 'required'
       ]);

       $valid['status'] = $request->status == 'on' ? '1' : '0';

       if(Brand::where('id',$id)->update($valid)){
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
