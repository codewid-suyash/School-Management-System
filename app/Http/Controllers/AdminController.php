<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(){
        return view("admin.login");
    }
    public function dashboard(){
        return view("admin.dashboard");
    }
    public function form(){
        return view("admin.form");
    }
    public function table(){
        return view("admin.table");
    }

    public function register(){
        $user = new User();
        $user->name = "Suyash";
        $user->email = "ss@gmail.com";
        $user->password = Hash::make("123456");
        $user->save();
        return redirect()->route('admin.login')->with('success','User Registered Successfully');
    }
    public function authenticate(Request $req){
        
        $req->validate([
            "email"=> "required",
            "password"=> "required",
        ]);
        // dd($req->all());

        if(Auth::guard('admin')->attempt(['email'=>$req->email,'password'=>$req->password])){
            // echo "Login Success";

            if(Auth::guard('admin')->user()->role != 'admin')
            {
                Auth::guard('admin')->logout();
                return redirect()->route('admin.login')->with('error','Unauthorized User - Access Denied');
            }
            else{
                return redirect()->route('admin.dashboard');
            }
        }else{
            return redirect()->route('admin.login')->with('error','Something Went Wrong');
        }
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('success','Logout Successfully');
    }
}
