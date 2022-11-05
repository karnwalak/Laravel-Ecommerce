<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function index()
    {
        $slider = Slider::all();
        return view('layouts.frontend.index',compact('slider'));
    }

    public function get_category()
    {
        $category = Category::all();
        // return $category;
        return view('layouts.frontend.collections.index',compact('category'));
    }

    public function get_category_product($slug)
    {
        $category = Category::with('brand')->where('slug',$slug)->first();
        if($category){
            $product = $category->products()->get();
            // return $product;
            return view('layouts.frontend.collections.products.index',compact('product','category'));
        }else{
            return redirect()->back();
        }
    }

    
    public function product_view($id)
    {
        $product = Product::find($id);
        return view('layouts.frontend.collections.products.view',compact('product'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
