<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CategoryCreateRequest;
use App\Http\Requests\CategoryUpdateRequest;

class CategoryController extends Controller
{
    public function index()
    {
        return view('layouts.admin.category.index');
    }

    
    public function create()
    {
        return view('layouts.admin.category.create');
    }

    
    public function store(CategoryCreateRequest $request)
    {
        $res = new Category;
        $res->name = $request->name;
        $res->slug = $request->slug;
        $res->description = $request->description;
        $res->meta_title = $request->meta_title;
        $res->meta_keyword = $request->meta_keyword;
        $res->meta_description = $request->meta_description;
        $res->status = $request->status== 'on' ? '1' : '0';
        
        if($request->hasFile('file')){
            $file = $request->file('file');
            $file_name = time().'.'.$file->getClientOriginalExtension();
            $request['image']=$file_name;
            $res->image = $file_name;
            $file->move('category', $file_name);
        }
        if($res->save()){
            return redirect()->route('categories.index')->with('message','Category Created Successfully!');
        }else{
            return redirect()->route('categories.index')->with('error','Category Not Created!');
        }
    }

    
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $category = Category::find($id);
        return view('layouts.admin.category.edit',compact('category'));
    }

    
    public function update(CategoryUpdateRequest $request, $id)
    {
        $res = Category::find($id);
        $res->name = $request->name;
        $res->slug = $request->slug;
        $res->description = $request->description;
        $res->meta_title = $request->meta_title;
        $res->meta_keyword = $request->meta_keyword;
        $res->meta_description = $request->meta_description;
        $res->status = $request->status== 'on' ? '1' : '0';
        
        if($request->hasFile('file')){
            $file = $request->file('file');
            $file_name = time().'.'.$file->getClientOriginalExtension();
            $request['image']=$file_name;
            $res->image = $file_name;
            $file->move('category', $file_name);
        }
        if($res->save()){
            return redirect()->route('categories.index')->with('message','Category Updated Successfully!');
        }else{
            return redirect()->route('categories.index')->with('error','Category Not Updated!');
        }
    }

    
    public function destroy(Request $request)
    {
        $file = Category::find($request->pid);
        $path = 'category/'.$file->image;
        if(File::exists($path)){
            File::delete($path);
        }
        if($file->delete()){
            return redirect()->route('categories.index')->with('message','Category Deleted Successfully!');
        }else{
            return redirect()->route('categories.index')->with('error','Category Not Deleted!');
        }
    }
}
