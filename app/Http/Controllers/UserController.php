<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\AssignSubjectToClass;
use App\Models\AssignTeacherToClass;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login()
    {
        // Logic to display user login form
        return view('user.student.login');
    }
    public function dashboard()
    {
        $announcements = Announcement::where('type','student')->latest()->get();
        // Logic to display user dashboard
        return view('user.student.dashboard', compact('announcements'));
    }

    public function  authenticate(Request $request)
    {
        if(Auth::attempt(['email'=> $request->email, 'password' => $request->password])) {
            // Authentication passed...
            if(Auth::user()->role != 'student') {
                Auth::logout();
                return redirect()->route('student.login')->with('error', 'Unauthorized User - Access Denied');
            }
            return redirect()->route('student.dashboard');
        }
        else {
            return redirect()->route('student.login')->with('error', 'Something Went Wrong');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('student.login')->with('success', 'Logged out successfully');
    }

    public function changePassword()
    {
        // Logic to display change password form
        return view('user.student.change-password');
    }
    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
            'password_confirmation' => 'required|same:new_password',
        ]);
        $user = User::find(Auth::id());
        $oldPassword = $request->old_password;
        $newPassword = $request->new_password;
        // Check if the old password matches the current password
        if(Hash::check($oldPassword, $user->password)) {
            $user->password = Hash::make($newPassword);
            $user->save();
            return redirect()->route('student.change-password')->with('success', 'Password updated successfully');
        } else {
            return redirect()->route('student.change-password')->with('error', 'Old password is incorrect');
        }

    }

    public function mySubject()
    {
        $class_id = Auth::guard('web')->user()->class_id;
        $assign_subjects= AssignTeacherToClass::where('class_id', $class_id)->with('subject', 'teacher')->get();
        return view('user.student.mysubject', compact('assign_subjects'));
    }
}
