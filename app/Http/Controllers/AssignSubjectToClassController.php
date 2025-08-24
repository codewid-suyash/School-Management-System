<?php

namespace App\Http\Controllers;

use App\Models\AssignSubjectToClass;
use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\Subject;
use Illuminate\Auth\Events\Validated;

class AssignSubjectToClassController extends Controller
{
    public function index()
    {
        $classes=Classes::all();
        $subjects=Subject::all();
        return view('assign-subject.form', compact('classes', 'subjects'));
    }
    public function store(Request $request)
    {
      $request->validate([
            'class_id' => 'required',
            'subject_id' => 'required',
        ]);
        $class_id= $request->input('class_id');
        $subject_id= $request->input('subject_id');
        
        foreach ($subject_id as $subject_id) {
            AssignSubjectToClass::updateOrCreate(
                ['class_id' => $class_id, 'subject_id' => $subject_id],
                ['class_id' => $class_id, 'subject_id' => $subject_id]
            );
        }
        return redirect()->route('assign-subject.create')->with('success', 'Subject assigned to class successfully.');
    }

    public function read(Request $request){
        $assignSubjects = AssignSubjectToClass::query()->with(['class', 'subject'])->latest();

        if($request->filled('class_id'))
        {
            $assignSubjects = $assignSubjects->where('class_id', $request->get('class_id'));
        }
        if($request->filled('subject_id'))
        {
            $assignSubjects = $assignSubjects->where('subject_id', $request->get('subject_id'));
        }
        $assignSubjects = $assignSubjects->get();
        $classes = Classes::all();
        $subjects = Subject::all();
        return view('assign-subject.list', compact('assignSubjects', 'classes', 'subjects'));
    }
    public function edit($id)
    {
        $assignSubject = AssignSubjectToClass::findOrFail($id);
        $classes = Classes::all();
        $subjects = Subject::all();
        return view('assign-subject.edit', compact('assignSubject', 'classes', 'subjects'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'class_id' => 'required',
            'subject_id' => 'required',
        ]);

        $assignSubject = AssignSubjectToClass::findOrFail($id);
        $assignSubject->update($request->all());

        return redirect()->route('assign-subject.read')->with('success', 'Subject updated successfully.');
    }
    public function destroy($id)
    {
        $assignSubjectToClass = AssignSubjectToClass::findOrFail($id);
        $assignSubjectToClass->delete();

        return redirect()->route('assign-subject.read')->with('success', 'Subject Deleted from class successfully.');
    }
}
