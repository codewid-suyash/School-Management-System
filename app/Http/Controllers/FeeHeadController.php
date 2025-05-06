<?php

namespace App\Http\Controllers;

use App\Models\FeeHead;
use Illuminate\Http\Request;

class FeeHeadController extends Controller
{
     public function index()
    {
        return view("feehead.feehead_create");
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'name'=>'required',
        ]);
        $data = new FeeHead();
        $data->name = $request->name; 
        $data->save();
        return redirect()->route('fee-head.read')->with('success','Fee Head Added Successfully');

    }

    public function read()
    {
        $data['fee_head']=FeeHead::get();
        return view('feehead.feehead_list',$data);
    }

    public function edit($id)
    {
        $data['fee_head']=FeeHead::find($id);
        return view('feehead.feehead_edit',$data);
    }
    public function update(Request $request)
    {
        $data = FeeHead::find($request->id);
        $data->name = $request->name;
        $data->update();
        return redirect()->route('fee-head.read')->with('success','Fee Head Updated Successfully');
    }
    public function destroy($id)
    {
        $data=FeeHead::find($id);
        $data->delete();
        return redirect()->route('fee-head.read')->with('success','Fee Head Deleted Successfully');
    }

   
}
