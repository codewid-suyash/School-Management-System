<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    public function index()
    {
        return view("class.class_create");
    }
    public function store(Request $request)
    {
        // dd($request->name);
        $request->validate([
            "name"=>"required"
        ]);
        $data = new Classes();
        $data->name = $request->name;
        $data->save();
        return redirect()->route('class.read')->with('success','Class Added Successfully');
    }
    public function read()
    {
        $data['classes'] = Classes::get();
        return view('class.class_list',$data);
    }
    public function edit($id)
    {
        $data['classes'] = Classes::find($id);
        return view('class.class_edit',$data);
    }

    public function update(Request $request)
    {
        $data = Classes::find($request->id);
        $data->name = $request->name;
        $data->update();
        return redirect()->route('class.read')->with('success','Class Updated Successfully');
    }

    public function destroy($id)
    {
        $data=Classes::find($id);
        $data->delete();
        return redirect()->route('class.read')->with('success','Class Deleted Successfully');
    }

 

  
}
