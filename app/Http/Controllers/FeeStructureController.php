<?php

namespace App\Http\Controllers;

use App\Models\FeeHead;
use App\Models\AcademicYear;
use App\Models\Classes;
use App\Models\FeeStructure;
use Illuminate\Http\Request;

class FeeStructureController extends Controller
{

    public function index()
    {
        $data['classes'] = Classes::all();
        $data['academic_years'] = AcademicYear::all();
        $data['fee_heads'] = FeeHead::all();

        return view('feestructure.create',$data);
    }
    public function store(Request $request)
    {

        $request->validate([
            'class_id'=>'required',
            'academic_year_id'=>'required',
            'fee_head_id'=>'required',
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
        // FeeStructure::create([$request->all()]);
        //         dd($request->all());
        $feeStructure = new FeeStructure();
        $feeStructure->class_id = $request->class_id;
        $feeStructure->academic_year_id = $request->academic_year_id;
        $feeStructure->fee_head_id = $request->fee_head_id;
        $feeStructure->april = $request->april;
        $feeStructure->may = $request->may;
        $feeStructure->june = $request->june;
        $feeStructure->july = $request->july;
        $feeStructure->august = $request->august;
        $feeStructure->september = $request->september;
        $feeStructure->october = $request->october;
        $feeStructure->november = $request->november;
        $feeStructure->december = $request->december;
        $feeStructure->january = $request->january;
        $feeStructure->february = $request->february;
        $feeStructure->march = $request->march;
        $feeStructure->save();

        return redirect()->route('fee-structure.read')->with('success','Fee Structure Added Successfully');

    }

    public function read(Request $request)
    {
        $feestructures = FeeStructure::with(['FeeHead','Classes','AcademicYear' ])->latest();
        if($request->filled('class_id')){
            $feestructures->where('class_id', $request->get('class_id'));
        }
        if($request->filled('academic_year_id')){
            $feestructures->where('academic_year_id', $request->get('academic_year_id'));
        }
        $data['feestructures'] = $feestructures->get();

        $data['classes'] = Classes::all();
        $data['academic_years'] = AcademicYear::all();

        return view('feestructure.list', $data);
    }

    public function destroy($id)
    {
        $feeStructure = FeeStructure::findOrFail($id);
        $feeStructure->delete();

        return redirect()->route('fee-structure.read')->with('success', 'Fee Structure Deleted Successfully');
    }
    public function edit($id)
    {
        $data['feestructure'] = FeeStructure::findOrFail($id);

        $data['classes'] = Classes::all();
        $data['academic_years'] = AcademicYear::all();
        $data['fee_heads'] = FeeHead::all();

        return view('feestructure.edit', $data);
    }
  public function update(Request $request, $id)
    {
        $request->validate([
            'class_id'=>'required',
            'academic_year_id'=>'required',
            'fee_head_id'=>'required',
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

        $feeStructure = FeeStructure::findOrFail($id);
        $feeStructure->class_id = $request->class_id;
        $feeStructure->academic_year_id = $request->academic_year_id;
        $feeStructure->fee_head_id = $request->fee_head_id;
        $feeStructure->april = $request->april;
        $feeStructure->may = $request->may;
        $feeStructure->june = $request->june;
        $feeStructure->july = $request->july;
        $feeStructure->august = $request->august;
        $feeStructure->september = $request->september;
        $feeStructure->october = $request->october;
        $feeStructure->november = $request->november;
        $feeStructure->december = $request->december;
        $feeStructure->january = $request->january;
        $feeStructure->february = $request->february;
        $feeStructure->march = $request->march;

        $feeStructure->save();

        return redirect()->route('fee-structure.read')->with('success', 'Fee Structure Updated Successfully');
    }
}
