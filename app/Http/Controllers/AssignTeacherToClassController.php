<?php

namespace App\Http\Controllers;

use App\Models\AssignSubjectToClass;
use App\Models\AssignTeacherToClass;
use App\Models\Classes;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;

class AssignTeacherToClassController extends Controller
{
    public function index()
    {
        $data['classes']=Classes::all();
        $data['subjects']=Subject::all();
        $data['teachers']=User::where('role','teacher')->get();

        return view('assign-teacher.create', $data);
    }
    public function findSubject(Request $request)
    {
        $class_id = $request->input('class_id');
        $subjects = AssignSubjectToClass::with('subject')->where('class_id', $class_id)->get();
        return response()->json([
            'status' => true,
            'subjects' => $subjects
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'class_id' => 'required',
            'subject_id' => 'required',
            'teacher_id' => 'required',
        ]);
        AssignTeacherToClass::updateOrCreate([
            'class_id' => $request->class_id,
            'subject_id' => $request->subject_id,
        ],
        [
            'class_id' => $request->class_id,
            'subject_id' => $request->subject_id,
            'teacher_id' => $request->teacher_id
        ]
    );
        return redirect()->route('assign-teacher.create')->with('success', 'Teacher assigned successfully');
    }

    public function read(Request $request){
        $data['classes']=Classes::all();
        $query = AssignTeacherToClass::query()->with(['class', 'subject', 'teacher'])->latest();
        if($request->filled('class_id')){
            $query->where('class_id', $request->class_id);
        }
        $data['assign_teachers']=$query->get();

        return view('assign-teacher.list', $data);
    }
    public function edit(AssignTeacherToClass $assignTeacherToClass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AssignTeacherToClass $assignTeacherToClass)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AssignTeacherToClass $assignTeacherToClass)
    {
        //
    }
}
