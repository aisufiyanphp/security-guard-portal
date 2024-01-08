<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;
use App\Models\EmailToken;
use App\Mail\WelcomeMail;

class CompanyController extends Controller
{
    protected $result;
    public function companySignup(Request $request){        
        $validateInput = Validator::make($request->all(), [
                           "company_name" => "required|string|min:3",
                           "company_email" => "required|email|unique:companys,company_email",
                           "company_mobile_number" => "required|numeric|digits:10|unique:companys,company_mobile_number",
                           "company_password" => "required|min:5",
                           "company_address" => "required",
                           "company_document" => "required"
                         ])->stopOnFirstFailure();
        if($validateInput->fails()){
            $errMsg = $validateInput->errors()->first();
            $this->result["status"] = false;
            $this->result["message"] = $errMsg;
            return response()->json($this->result);
        }else{
            $hashPassword = Hash::make($request->input("company_password"));
            $image = $request->file("company_document");
        do {
            $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        }while(DB::table("companys")->where("company_document", $filename)->exists());         
            $image->move(public_path('company_document/image'), $filename);

            $createCompany = Company::create([
                 "company_name" => $request->input("company_name"),
                 "company_email" => $request->input("company_email"),
                 "company_mobile_number" => $request->input("company_mobile_number"),
                 "company_password" => $hashPassword,
                 "company_state" => $request->input("company_state"),
                 "company_city" => $request->input("company_city"),
                 "company_pincode" => $request->input("company_pincode"),
                 "company_address" => $request->input("company_address"),
                 "company_document" => $filename
            ]);
            if($createCompany){              
               $token = $this->getEmailToken();
               EmailToken::create(["company_id"=>$createCompany->id, "email_token"=>$token]);
               $companyDetail = ["name"=>$createCompany->company_name, "token"=>$token]; 
               Mail::to("laravelphp10@gmail.com")->send(new WelcomeMail($companyDetail));
               $this->result["status"] = true;
               $this->result["message"] = $request->input("company_name")." licence company successfully signup";
               $this->result["company_data"] = $createCompany;
            }else{
               $this->result["status"] = false;
               $this->result["message"] = "Technical Error! signup process not complete";
            }
            return response()->json($this->result);
        }
    }

    public function companySignin(Request $request){
        $validateInput = Validator::make($request->all(), [
             "email" => "required|email",
             "password" => "required|min:5",
        ])->stopOnFirstFailure();
        if($validateInput->fails()){
            $errMsg = $validateInput->errors()->first();
            $this->result["status"] = false;
            $this->result["message"] = $errMsg;
            return response()->json($this->result);
        }
        try{
            if(Auth::guard('company')->attempt(["company_email"=>$request->input("email"), "company_password"=>$request->input("password")])){
               echo "Authenticate"; 
            }else{
               echo "Not Authenticate";  
            }
        }catch(Exception $e){
            debug($e->getMessage());
        }
        
    }

    public function companyList(Request $request){
        if(filled($request->input("status"))){
            $status = $request->input("status");
            if($request->input("status") == "viewall"){
                return redirect()->route("company-list");
            }else{
            $companies = Company::when("company_status", function($query) use ($status){
         return $query->where('company_status', $status);
            })->get();
        }
        }else{
            $companies = Company::orderBy("id", "desc")->get();
        }
       return view("company", compact("companies"));
    }

    public function CompantDetails(Request $request, $id){
        $companydetails = Company::where("id",$id)->get();
        return view("company-details",compact("companydetails"));
    }

    public function testApi(){
        $send = Mail::to("laravelphp10@gmail.com")->send(new WelcomeMail);
        debug($send);
    }

    public function getEmailToken(){
        do {
            $token = uniqid(time());
        }while(DB::table("email_token")->where("email_token", $token)->exists());
        return $token;
    }

    public function companies(){
        $companies = Company::orderBy("id", "desc")->get();
        if($companies->isEmpty()){
            $this->result["status"] = false;
            $this->result["message"] =" companies not exit ";
            $this->result["company_data"] = [];           
        }else{         
               foreach($companies as $company){
                $company->company_document =  url('company_document/image/'.$company->company_document);
               }
            $this->result["status"] = true;
            $this->result["message"] = "companies get successfully ";
            $this->result["company_data"] = $companies;         
        }
        return response()->json($this->result);
    }
}
