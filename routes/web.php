<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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
    return view('welcome');
});

 Route::prefix("admin")->group(function () {
    Route::get("dashboard", [AdminController::class, "dashBoard"])->name("dashboard");
    Route::get("login", [AdminController::class, "adminLogin"])->name("login");
    Route::post("login-proccess", [AdminController::class, "adminLoginProccess"])->name("login-proccess");

    Route::get("admin-logout", [AdminController::class, "adminLogOut"])->name("admin-logout");

    Route::get("change-password", [AdminController::class, "changePassword"])->name("change-password");

    Route::post("change-password-proccess", [AdminController::class, "changePasswordProccess"])->name('changePasswordProccess');
 });
