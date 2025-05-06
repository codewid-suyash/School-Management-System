<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use Illuminate\Http\Request;

class AcademicYearController extends Controller
{
    public function index()
    {
        return view("academic_year");
    }
    public function store(Request $request)
    {
        // dd($request->name);
        $request->validate([
            "name"=>"required"
        ]);
        $data = new AcademicYear();
        $data->name = $request->name;
        $data->save();
        return redirect()->route('academic-year.read')->with('success','Academic Year Added Successfully');
    }
    public function read()
    {
        $data['academic_year'] = AcademicYear::get();
        return view('academic_year_list',$data);
    }
    public function edit($id)
    {
        $data['academic_year'] = AcademicYear::find($id);
        return view('academic_year_edit',$data);
    }

    public function update(Request $request)
    {
        $data = AcademicYear::find($request->id);
        $data->name = $request->name;
        $data->update();
        return redirect()->route('academic-year.read')->with('success','Academic Year Updated Successfully');
    }

    public function destroy($id)
    {
        $data=AcademicYear::find($id);
        $data->delete();
        return redirect()->route('academic-year.read')->with('success','Academic Year Deleted Successfully');
    }
}