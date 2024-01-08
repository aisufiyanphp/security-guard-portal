<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get("test-api", [CompanyController::class, "testApi"]);
Route::post("company-signup", [CompanyController::class, "companySignup"]);
Route::post("company-signin", [CompanyController::class, "companySignin"]);
Route::get("company-list", [CompanyController::class, "companies"]);

