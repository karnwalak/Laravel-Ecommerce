<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Color;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductColor;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ProductCreateRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::with('category')->orderBy('id','desc')->paginate(10);
        return view('layouts.admin.product.index',compact('product'));
    }
    
    public function create()
    {
        $category = Category::all();
        $brand = Brand::all();
        $color = Color::all();
        return view('layouts.admin.product.create',compact(['category','brand','color']));
    }

    public function store(ProductCreateRequest $request)
    {
        // return $request;
        $res = new Product;
        $res->category_id = $request->category;
        $res->name = $request->product_name;
        $res->slug = $request->product_slug;
        $res->brand = $request->brand;
        $res->small_description = $request->small_description;
        $res->description = $request->description;
        $res->meta_title = $request->meta_title;
        $res->meta_keyword = $request->meta_keyword;
        $res->meta_description = $request->meta_description;
        $res->original_price = $request->original_price;
        $res->selling_price = $request->selling_price;
        $res->quantity = $request->quantity;
        $res->trending = $request->trending == 'on' ? '0' : '1';
        $res->status = $request->status == 'on' ? '0' : '1';
        $res->save();
        if($request->hasFile('files')){
           $i=1;
           $path = 'product'; 
           foreach ($request->file('files') as $file) {
              $file_name = time().$i++.'.'.$file->getClientOriginalExtension();
              $file->move($path,$file_name);
              $img = new ProductImage;
              $img->product_id = $res->id;
              $img->image = $path.'/'.$file_name;
              $img->save();
           }
        }

        if(isset($request->colors) && count($request->colors)>0){
           foreach ($request->colors as $key => $value) {
              $color = new ProductColor;
              $color->product_id = $res->id;
              $color->color_id = $value;
              $color->quantity = $request->color_quantity[$key] ?? '0';
              $color->save();
           }
        }

        return redirect()->route('products.index')->with('message','Product Added Successfully!');
        
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $product=Product::with('productColors')->find($id);
        // return $product->productColors;
        $color_exist = [];
        $qunatity_exist = [];
        foreach ($product->productColors as $value) {
            $color_exist[] = $value->color_id;
            $qunatity_exist[] = $value->quantity;
        }
        $color = Color::all();
        $category = Category::all();
        $brand = Brand::all();
        return view('layouts.admin.product.edit',compact(['category','brand','product','color','color_exist','qunatity_exist']));
    }

    public function update(Request $request, $id)
    {
        $res = Product::find($id);
        $res->category_id = $request->category;
        $res->name = $request->product_name;
        $res->slug = $request->product_slug;
        $res->brand = $request->brand;
        $res->small_description = $request->small_description;
        $res->description = $request->description;
        $res->meta_title = $request->meta_title;
        $res->meta_keyword = $request->meta_keyword;
        $res->meta_description = $request->meta_description;
        $res->original_price = $request->original_price;
        $res->selling_price = $request->selling_price;
        $res->quantity = $request->quantity;
        $res->trending = $request->trending == 'on' ? '0' : '1';
        $res->status = $request->status == 'on' ? '0' : '1';
        $res->save();
        if($request->hasFile('files')){
           $exist = ProductImage::where('product_id',$id)->get();
           foreach($exist as $ee){
            if(File::exists($ee->image)){
                File::delete($ee->image);
            }
            ProductImage::find($ee->id)->delete();
           }
           $i=1;
           $path = 'product'; 
           foreach ($request->file('files') as $file) {
              $file_name = time().$i++.'.'.$file->getClientOriginalExtension();
              $file->move($path,$file_name);
              $img = new ProductImage;
              $img->product_id = $res->id;
              $img->image = $path.'/'.$file_name;
              $img->save();
           }
        }

        if(isset($request->colors) && count($request->colors)>0){
           ProductColor::where('product_id',$id)->delete();
           foreach ($request->colors as $key => $value) {
              $color = new ProductColor;
              $color->product_id = $id;
              $color->color_id = $value;
              $color->quantity = $request->color_quantity[$key] ?? '0';
              $color->save();
           }
        }

        return redirect()->route('products.index')->with('message','Product Updated Successfully!');
    }

    public function destroy(Request $request)
    {
        $file = Product::find($request->pid);
        $exist = ProductImage::where('product_id',$request->pid)->get();
        if(count($exist)>0){
            foreach($exist as $ee){
            if(File::exists($ee->image)){
                File::delete($ee->image);
            }
            ProductImage::find($ee->id)->delete();
        }
        }
        if($file->delete()){
            return redirect()->route('products.index')->with('message','Product Deleted Successfully!');
        }else{
            return redirect()->route('products.index')->with('error','Product Not Deleted!');
        }
    }

    public function image_delete(Request $request)
    {
        // return $request->id;
        $ee = ProductImage::find($request->id);
        if(File::exists($ee->image)){
            File::delete($ee->image);
        }
        if(ProductImage::find($request->id)->delete()){
            return redirect()->back()->with('message','Product Image Deleted Successfully!');
        }else{
            return redirect()->back()->with('error','Product Image Not Deleted!');
        }
    }
}