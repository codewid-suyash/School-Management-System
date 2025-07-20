<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use App\Models\Classes;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index()
    {
        // Show the form to create a new student
        $data['classes'] = Classes::all();
        $data['academic_years'] = AcademicYear::all();
        return view('student.create',$data);
    }
    public function store(Request $request)
    {
       $request->validate([
            'father_name' => 'required|string|max:255',
            'mother_name' => 'required|string|max:255',
            'admission_date' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'class_id' => 'required|exists:classes,id',
            'academic_year_id' => 'required|exists:academic_years,id',
            'mob_no' => 'required|numeric',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'dob' => 'required|date',
       ]);
       
        // Create a new student record
        $student = new User();
        $student->father_name = $request->father_name;
        $student->mother_name = $request->mother_name;
        $student->admission_date = $request->admission_date;
        $student->name = $request->name;
        $student->class_id = $request->class_id;
        $student->academic_year_id = $request->academic_year_id;
        $student->mob_no = $request->mob_no;
        $student->email = $request->email;
        $student->password = Hash::make($request->password);
        $student->dob = $request->dob;
        $student->role = "student"; // Assuming a default role for students
        $student->save();
        return redirect()->route('student.read')->with('success', 'Student added successfully');        

    }

    public function read(Request $request)
    {
        // Fetch all students
        $students = User::with(['classes', 'academicYear'])->where('role', 'student')->latest('id');
        if($request->filled('class_id'))
        {
            $students->where('class_id', $request->get('class_id'));
        }
        if($request->filled('academic_year_id'))
        {
            $students->where('academic_year_id', $request->get('academic_year_id'));
        }
        $data['classes'] = Classes::all();
        $data['academic_years'] = AcademicYear::all();
        $data['students'] = $students->get();
        return view('student.list', $data);
    }

    public function edit($id)
    {
        // Show the form to edit a student
        $data['student'] = User::findOrFail($id);
        $data['classes'] = Classes::all();
        $data['academic_years'] = AcademicYear::all();
        return view('student.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'father_name' => 'required|string|max:255',
            'mother_name' => 'required|string|max:255',
            'admission_date' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'class_id' => 'required|exists:classes,id',
            'academic_year_id' => 'required|exists:academic_years,id',
            'mob_no' => 'required|numeric',
            'email' => 'required|email',
            'dob' => 'required|date',
        ]);

        // Update the student record
        $student = User::findOrFail($id);
        $student->father_name = $request->input('father_name');
        $student->mother_name = $request->input('mother_name');
        $student->admission_date = $request->input('admission_date');
        $student->name = $request->input('name');
        $student->class_id = $request->input('class_id');
        $student->academic_year_id = $request->input('academic_year_id');
        $student->mob_no = $request->input('mob_no');
        $student->email = $request->input('email');
        $student->dob = $request->input('dob');
        $student->update();

        return redirect()->route('student.read')->with('success', 'Student updated successfully');
    }

    public function destroy($id)
    {
        // Delete a student record
        $student = User::findOrFail($id);
        $student->delete();
        return redirect()->route('student.read')->with('success', 'Student deleted successfully');
    }
}
