<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\IndikatorController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\VariabelController;
use App\Http\Controllers\Admin\WaliKelasController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Walas\LaporanPerkembanganController;
use App\Http\Controllers\Walas\ProfileController;

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


Auth::routes();

// Route User
Route::middleware(['auth'])->group(function () {
    Route::get("/dashboard", [HomeController::class, 'userHome']);
    Route::get('/profile', [ProfileController::class, 'edit']);
    Route::post('/profile/{id}', [ProfileController::class, 'update']);
    Route::get('/change-password', [ProfileController::class, 'changePassword']);
    Route::post('/change-password/{id}', [ProfileController::class, 'updatePassword']);
    Route::get('/siswa/detail-nilai/{id}', [HomeController::class, 'detailNilaiSiswa']);
});

Route::get('/', function () {
    return view('before-login');
});

// Route Walas
Route::middleware(['auth', 'wali-kelas'])->group(function () {
    Route::get("/dashboard-walikelas", [HomeController::class, 'walasHome']);

    Route::get("/siswa", [LaporanPerkembanganController::class, 'siswa']);

    Route::get("/bimbingan-fisik", [LaporanPerkembanganController::class, 'bimbinganFisik']);
    Route::get("/bimbingan-mental", [LaporanPerkembanganController::class, 'bimbinganMental']);
    Route::get("/bimbingan-sosial", [LaporanPerkembanganController::class, 'bimbinganSosial']);
    Route::get("/kemandirian-emosional", [LaporanPerkembanganController::class, 'kemandirianEmosional']);
    Route::get("/kemandirian-perilaku", [LaporanPerkembanganController::class, 'kemandirianPerilaku']);
    Route::get("/kemandirian-nilai", [LaporanPerkembanganController::class, 'kemandirianNilai']);

    Route::get("/laporan-perkembangan/show/{id}", [LaporanPerkembanganController::class, 'show']);
    Route::post("/laporan-perkembangan", [LaporanPerkembanganController::class, 'store']);
    Route::get("/laporan-perkembangan/{id}", [LaporanPerkembanganController::class, 'edit']);
    Route::post("/laporan-perkembangan/{id}", [LaporanPerkembanganController::class, 'update']);
    Route::get("/laporan-perkembangan/delete/{id}", [LaporanPerkembanganController::class, 'destroy']);

    Route::get('/profile', [ProfileController::class, 'edit']);
    Route::post('/profile/{id}', [ProfileController::class, 'update']);
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

    Route::get("/admin/kelas", [KelasController::class, 'index']);
    Route::post("/admin/kelas", [KelasController::class, 'store']);
    Route::get("/admin/kelas/{id}", [KelasController::class, 'edit']);
    Route::post("/admin/kelas/{id}", [KelasController::class, 'update']);
    Route::get("/admin/kelas/delete/{id}", [KelasController::class, 'destroy']);

    Route::get("/admin/siswa", [SiswaController::class, 'index']);
    Route::get("/admin/siswa/create", [SiswaController::class, 'create']);
    Route::post("/admin/siswa", [SiswaController::class, 'store']);
    Route::get("/admin/siswa/{id}", [SiswaController::class, 'edit']);
    Route::post("/admin/siswa/{id}", [SiswaController::class, 'update']);
    Route::get("/admin/siswa/delete/{id}", [SiswaController::class, 'destroy']);
    Route::get("/admin/siswa/show/{id}", [SiswaController::class, 'show']);
});
