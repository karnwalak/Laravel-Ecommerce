<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    
    public function index()
    {
        $slider = Slider::orderBy('id','desc')->paginate(10);
        return view('layouts.admin.slider.index',compact('slider'));
    }

    public function create()
    {
        return view('layouts.admin.slider.create');
    }

    public function store(Request $request)
    {
        $valid = $request->validate([
           'title' => 'required',
           'description' => 'required',
           'file' => 'required',
        ]);

        if($request->hasFile('file')){
            $file = $request->file('file');
            $path = 'sliders'; 
            $file_name = time().'.'.$file->getClientOriginalExtension();
            $file->move($path,$file_name);
            $valid['image'] = $path.'/'.$file_name;
        }
        $valid['status'] = $request->status == 'on' ? '0' : '1';

        if(Slider::create($valid)){
            return redirect()->route('sliders.index')->with('message','Slider Added Successfully!');
        }else{
            return redirect()->route('sliders.index')->with('error','Slider Not Added!');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('layouts.admin.slider.edit',compact('slider'));
    }

    public function update(Request $request, $id)
    {
        $valid = $request->validate([
           'title' => 'required',
           'description' => 'required',
        ]);
        $slider = Slider::find($id);
        if($request->hasFile('file')){
            if(File::exists($slider->image)){
                File::delete($slider->image);
            }
            $file = $request->file('file');
            $path = 'sliders'; 
            $file_name = time().'.'.$file->getClientOriginalExtension();
            $file->move($path,$file_name);
            $valid['image'] = $path.'/'.$file_name;
        }
        $valid['status'] = $request->status == 'on' ? '0' : '1';

        if($slider->update($valid)){
            return redirect()->route('sliders.index')->with('message','Slider Updated Successfully!');
        }else{
            return redirect()->route('sliders.index')->with('error','Slider Not Updated!');
        }
    }

    public function destroy($id)
    {
        $ee = Slider::find($id);
        if(File::exists($ee->image)){
            File::delete($ee->image);
        }
        if($ee->delete()){
            return redirect()->route('sliders.index')->with('message','Slider Added Successfully!');
        }else{
            return redirect()->route('sliders.index')->with('error','Slider Not Added!');
        }
    }
}
