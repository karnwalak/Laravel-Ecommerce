<?php

namespace App\Http\Controllers\Admin;

use App\Models\Color;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ColorController extends Controller
{
    
    public function index()
    {
        $colors = Color::orderBy('id','desc')->paginate(10);
        return view('layouts.admin.color.index',compact('colors'));
    }

    public function store(Request $request)
    {
        $valid = $request->validate([
            'color' => 'required'
        ]);

        $valid['status'] = $request->status == 'on' ? '0' : '1';

        if(Color::create($valid)){
          return redirect()->route('colors.index')->with('message','Color Added Successfully!');
        }else{
          return redirect()->route('colors.index')->with('error','Color Not Added!');
        }
    }

    public function edit($id)
    {
        $color = Color::find($id);
        return view('layouts.admin.color.edit',compact('color'));
    }


    public function update(Request $request, $id)
    {
        $valid = $request->validate([
            'color' => 'required'
        ]);

        $valid['status'] = $request->status == 'on' ? '0' : '1';

        if(Color::where('id',$id)->update($valid)){
          return redirect()->route('colors.index')->with('message','Color Added Successfully!');
        }else{
          return redirect()->route('colors.index')->with('error','Color Not Added!');
        }
    }

    public function destroy(Request $request)
    {
        if(Color::find($request->pid)->delete()){
            return redirect()->route('colors.index')->with('message','Color Deleted Successfully!');
        }else{
            return redirect()->route('colors.index')->with('error','Color Not Deleted!');
        }
    }
}
