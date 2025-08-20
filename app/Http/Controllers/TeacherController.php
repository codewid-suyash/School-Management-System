<?php

namespace App\Http\Controllers;

use App\Models\User;
use Faker\Provider\bg_BG\PhoneNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    public function index()
    {
        return view('teacher.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'dob'=>'required|date',
            'father_name'=>'required',
            'mother_name'=>'required',
            'mob_no'=>'required|numeric',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:6',
        ]);
        $teacher = new User();
        $teacher->name = $request->name;
        $teacher->dob = $request->dob;
        $teacher->father_name = $request->father_name;
        $teacher->mother_name = $request->mother_name;
        $teacher->mob_no = $request->mob_no;
        $teacher->email = $request->email;
        $teacher->password = Hash::make($request->password);
        $teacher->role = 'teacher';
        $teacher->save();

        return redirect()->route('teacher.create')->with('success', 'Teacher created successfully.');
    }

    public function read()
    {
        $teachers = User::where('role', 'teacher')->latest()->get();
        return view('teacher.list', compact('teachers'));
    }

    public function edit($id)
    {
        $teacher = User::findOrFail($id);
        return view('teacher.edit', compact('teacher'));
    }

    public function update(Request $request, $id)
    {
        $teacher = User::findOrFail($id);
        $teacher->name = $request->name;
        $teacher->dob = $request->dob;
        $teacher->father_name = $request->father_name;
        $teacher->mother_name = $request->mother_name;
        $teacher->mob_no = $request->mob_no;
        $teacher->email = $request->email;
        $teacher->update();

        return redirect()->route('teacher.read')->with('success', 'Teacher updated successfully.');
    }

    public function destroy($id)
    {
        $teacher = User::findOrFail($id);
        $teacher->delete();

        return redirect()->route('teacher.read')->with('success', 'Teacher deleted successfully.');
    }

}
