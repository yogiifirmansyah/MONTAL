<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\IndikatorController;
use App\Http\Controllers\Admin\VariabelController;
use App\Http\Controllers\Admin\WaliKelasController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

// Route User
Route::middleware(['auth'])->group(function () {
    Route::get("/dashboard", [HomeController::class, 'userHome']);
});
// Route Walas
Route::middleware(['auth', 'wali-kelas'])->group(function () {
    Route::get("/dashboard-walikelas", [HomeController::class, 'walasHome']);
});
// Route Admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get("/admin/dashboard", [AdminController::class, 'adminHome']);

    Route::get("/admin/variabel", [VariabelController::class, 'index']);
    Route::post("/admin/variabel", [VariabelController::class, 'store']);
    Route::get("/admin/variabel/{id}", [VariabelController::class, 'edit']);
    Route::post("/admin/variabel/{id}", [VariabelController::class, 'update']);
    Route::get("/admin/variabel/delete/{id}", [VariabelController::class, 'destroy']);

    Route::get("/admin/indikator", [IndikatorController::class, 'index']);
    Route::post("/admin/indikator", [IndikatorController::class, 'store']);
    Route::get("/admin/indikator/{id}", [IndikatorController::class, 'edit']);
    Route::post("/admin/indikator/{id}", [IndikatorController::class, 'update']);
    Route::get("/admin/indikator/delete/{id}", [IndikatorController::class, 'destroy']);

    Route::get("/admin/wali-kelas", [WaliKelasController::class, 'index']);
    Route::get("/admin/wali-kelas/create", [WaliKelasController::class, 'create']);
    Route::post("/admin/wali-kelas", [WaliKelasController::class, 'store']);
    Route::get("/admin/wali-kelas/{id}", [WaliKelasController::class, 'edit']);
    Route::post("/admin/wali-kelas/{id}", [WaliKelasController::class, 'update']);
    Route::get("/admin/wali-kelas/delete/{id}", [WaliKelasController::class, 'destroy']);
    Route::get("/admin/wali-kelas/show/{id}", [WaliKelasController::class, 'show']);
});
