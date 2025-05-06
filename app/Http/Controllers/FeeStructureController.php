<?php

namespace App\Http\Controllers;

use App\Models\FeeStructure;
use Illuminate\Http\Request;

class FeeStructureController extends Controller
{
   
    public function index()
    {
        return view('feestructure.create');
    }
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'april'=>'required',
            'may'=>'required',
            'june'=>'required',
            'july'=>'required',
            'august'=>'required',
            'september'=>'required',
            'october'=>'required',
            'november'=>'required',
            'december'=>'required',
            'january'=>'required',
            'february'=>'required',
            'march'=>'required',
           
        ]);
        $data = new FeeStructure();
        $data->april = $request->name; 
        $data->may = $request->may; 
        $data->june = $request->june; 
        $data->july = $request->july; 
        $data->august = $request->august; 
        $data->september = $request->september; 
        $data->october = $request->october; 
        $data->november = $request->november; 
        $data->december = $request->december; 
        $data->january = $request->january; 
        $data->february = $request->february; 
        $data->march = $request->march; 
        $data->save();
        return redirect()->route('feestructure.read')->with('success','Fee Structure Added Successfully');

    }

    public function read(FeeStructure $feeStructure)
    {
        return view('feestructure.list');
    }

  
}
