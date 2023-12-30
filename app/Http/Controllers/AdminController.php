<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
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
        $validateInput = Validator::make($request->all(),[
            'current_password' => 'required',
            'new_password' => 'required|min:6',
            'confirmpassword' => 'required|same:new_password'
        ],[
            'current_password.required' => __('Current password is required'),
            'new_password.required' => __('New password is required'),
            'confirmpassword.required' => __('Confirm password is required'),
            'confirmpassword.same' => __('Confirm password or new password not matched')
        ])->stopOnFirstFailure();
        if($validateInput->fails()){
            Alert::toast($validateInput->errors()->first(), 'warning')->position('top-end');
            return back();
        }
        $admin = Admin::where("id", Session::get("AdminId"))->first();
        if(Hash::check($request->input("current_password"), $admin->password)){
            $hashpassword = Hash::make($request->input("confirmpassword"));
            $admin->password = $hashpassword;
            if($admin->save()){
                return $this->AdminLogout();
            }else{
                Alert::toast("Technical Error! Password not change", 'danger')->position('top-end');
                return back();
            }
        }else{
            Alert::toast("Current password not match", 'warning')->position('top-end');
            return back();
        }
    }
}
