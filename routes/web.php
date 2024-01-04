<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompanyController;
use App\Models\Company;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    Company::truncate();
    echo "company database clear";
    // try {
    //     Artisan::call('passport:install');
    //     $output = Artisan::output();
    //     debug($output, false);
    // } catch (\Exception $e) {
    //     echo "Error " . $e->getMessage();
    // }    
});

Route::get("verify-email/{token}", [AdminController::class, "verifyEmail"])->name("verify-email");
Route::prefix("admin")->group(function () {

    Route::group(['middleware' =>['adminlogin']], function(){
        Route::get("login", [AdminController::class, "adminLogin"])->name("login");
        Route::post("login-proccess", [AdminController::class, "adminLoginProccess"])->name("login-proccess");
    });

    Route::group(['middleware' =>['adminlogout']], function(){
        Route::get("dashboard", [AdminController::class, "dashBoard"])->name("dashboard");
        Route::get("admin-logout", [AdminController::class, "adminLogOut"])->name("admin-logout");
        Route::get("change-password", [AdminController::class, "changePassword"])->name("change-password");
        Route::post("change-password-proccess", [AdminController::class, "changePasswordProccess"])->name('change-password-proccess');

        Route::get("company-list", [CompanyController::class, "companyList"])->name("company-list");
        Route::get("view-company-details/{id}", [CompanyController::class, "CompantDetails"])->name("view-company-details");

    });

});
