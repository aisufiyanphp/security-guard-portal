<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class AdminController extends Controller
{


    public function dashBoard(){
        return view("dashboard");
    }
    public function adminLogin(){
        return view('login');
    }

    public function adminLoginProccess(Request $request){
        $request->validate([
            'email' =>'required',
            'password' =>'required'
        ]);
        $admin = Admin::where('email', $request->email)->first();
        if($admin){
              if(Hash::check($request->input("password"), $admin->password)){
                   Session::put("AdminLogin", true);
                   Session::put("AdminId", $admin->id);
                   Session::put("AdminName", $admin->name);
                   Session::regenerate();
                   return redirect()->route('dashboard');

              }else{
                  return back()->with("error", "Invalid email or password");
              }
        }else{
            return back()->with("error", "Invalid email or password");
        }
    }

    public function adminLogOut(){
        Session::flush("AdminLogin");
        Session::flush();
        return redirect()->route("login")->with("error",  "Admin Sucessfully Logout...");
    }

    public function changePassword(){
        return view("change-password");
    }

    public function changePasswordProccess(Request $request){

    }

}
