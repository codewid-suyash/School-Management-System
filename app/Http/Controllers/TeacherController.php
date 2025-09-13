<?php

namespace App\Http\Controllers;

use App\Models\AssignTeacherToClass;
use App\Models\User;
use Faker\Provider\bg_BG\PhoneNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function login(){
        return view('user.teacher.login');
    }

    public function authenticate(Request $request){
       $request->validate([
        'email'=>'required|email',
        'password'=>'required|min:6'
       ]);

       if(Auth::guard('teacher')->attempt(['email'=>$request->email,'password'=>$request->password]))
       {
        if(Auth::guard('teacher')->user()->role != 'teacher')
        {
            Auth::guard('teacher')->logout();
            return redirect()->route('teacher.login')->with('error', 'unauthorized user - access denied');
        }else{
            return redirect()->route('teacher.dashboard');
        }

       }
       return redirect()->route('teacher.login')->with('error', 'Invalid credentials');
    }

    public function dashboard(){
      return view('user.teacher.dashboard');
    }

    public function logout(){
        Auth::guard('teacher')->logout();
        return redirect()->route('teacher.login')->with('success', 'Logged out successfully.');
    }

    public function myClass(){
        $data['teacher_id'] = Auth::guard('teacher')->id();
        $data['assign_class'] = AssignTeacherToClass::where('teacher_id', $data['teacher_id'])->with('class','subject')->get();
        return view('user.teacher.myclass', $data);
    }
}
