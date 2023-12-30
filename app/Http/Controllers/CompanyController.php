<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Company;

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
                         ])->stopOnFirstFailure();
        if($validateInput->fails()){
            $errMsg = $validateInput->errors()->first();
            $this->result["status"] = false;
            $this->result["message"] = $errMsg;
            return response()->json($this->result);
        }else{

            $hashPassword = Hash::make($request->input("company_password"));
            $createCompany = Company::create([
                 "company_name" => $request->input("company_name"),
                 "company_email" => $request->input("company_email"),
                 "company_mobile_number" => $request->input("company_mobile_number"),
                 "company_password" => $hashPassword,
                 "company_state" => $request->input("company_state"),
                 "company_city" => $request->input("company_city"),
                 "company_pincode" => $request->input("company_pincode"),
                 "company_address" => $request->input("company_address"),
                 "company_document" => $request->input("company_document")
            ]);
            if($createCompany){
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

}
