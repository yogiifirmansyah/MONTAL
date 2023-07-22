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
use App\Http\Controllers\Walas\InstrumenController;
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

Route::get('/', function () {
    return view('before-login');
});


Auth::routes();

// Route User
Route::middleware(['auth'])->group(function () {
    Route::get("/dashboard", [HomeController::class, 'userHome']);
    Route::get('/profile', [ProfileController::class, 'edit']);
    Route::post('/profile/{id}', [ProfileController::class, 'update']);
    Route::get('/change-password', [ProfileController::class, 'changePassword']);
    Route::post('/change-password/{id}', [ProfileController::class, 'updatePassword']);
    Route::get('/siswa/detail-nilai/{id}', [HomeController::class, 'detailNilaiSiswa']);
    Route::get('/detail-instrumen-1/{id}', [HomeController::class, 'detailInstrumen1']);
    Route::get('/detail-instrumen-2/{id}', [HomeController::class, 'detailInstrumen2']);

    Route::get('/detail-instrumen-1/pertanyaan-lanjutan-1/{id}', [HomeController::class, 'pertanyaan1Lanjutan']);
    Route::get('/detail-instrumen-1/pertanyaan-lanjutan-2/{id}', [HomeController::class, 'pertanyaan2Lanjutan']);
    Route::get('/detail-instrumen-1/pertanyaan-lanjutan-3/{id}', [HomeController::class, 'pertanyaan3Lanjutan']);
    Route::get('/detail-instrumen-1/pertanyaan-lanjutan-4/{id}', [HomeController::class, 'pertanyaan4Lanjutan']);
    Route::get('/detail-instrumen-1/pertanyaan-lanjutan-5/{id}', [HomeController::class, 'pertanyaan5Lanjutan']);
    Route::get('/detail-instrumen-1/pertanyaan-lanjutan-6/{id}', [HomeController::class, 'pertanyaan6Lanjutan']);
    Route::get('/detail-instrumen-1/pertanyaan-lanjutan-7/{id}', [HomeController::class, 'pertanyaan7Lanjutan']);
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

    Route::get('/instrumen-1', [InstrumenController::class, 'index']);
    Route::get('/instrumen-1/create', [InstrumenController::class, 'create']);
    Route::post('/instrumen-1', [InstrumenController::class, 'store']);
    Route::get('/instrumen-1/{id}', [InstrumenController::class, 'edit']);
    Route::put('/instrumen-1/{id}', [InstrumenController::class, 'update']);
    Route::get('/instrumen/delete/{id}', [InstrumenController::class, 'destroy']);

    Route::get('/instrumen-1/pertanyaan-lanjutan-1/delete/{id}', [InstrumenController::class, 'destroyPertanyaanLanjutan1']);
    Route::get('/instrumen-1/pertanyaan-lanjutan-2/delete/{id}', [InstrumenController::class, 'destroyPertanyaanLanjutan2']);
    Route::get('/instrumen-1/pertanyaan-lanjutan-3/delete/{id}', [InstrumenController::class, 'destroyPertanyaanLanjutan3']);
    Route::get('/instrumen-1/pertanyaan-lanjutan-4/delete/{id}', [InstrumenController::class, 'destroyPertanyaanLanjutan4']);
    Route::get('/instrumen-1/pertanyaan-lanjutan-5/delete/{id}', [InstrumenController::class, 'destroyPertanyaanLanjutan5']);
    Route::get('/instrumen-1/pertanyaan-lanjutan-6/delete/{id}', [InstrumenController::class, 'destroyPertanyaanLanjutan6']);
    Route::get('/instrumen-1/pertanyaan-lanjutan-7/delete/{id}', [InstrumenController::class, 'destroyPertanyaanLanjutan7']);

    Route::get('/instrumen-1/pertanyaan-lanjutan-1/{id}', [InstrumenController::class, 'getPertanyaan1']);
    Route::get('/instrumen-1/pertanyaan-lanjutan-2/{id}', [InstrumenController::class, 'getPertanyaan2']);
    Route::get('/instrumen-1/pertanyaan-lanjutan-3/{id}', [InstrumenController::class, 'getPertanyaan3']);
    Route::get('/instrumen-1/pertanyaan-lanjutan-4/{id}', [InstrumenController::class, 'getPertanyaan4']);
    Route::get('/instrumen-1/pertanyaan-lanjutan-5/{id}', [InstrumenController::class, 'getPertanyaan5']);
    Route::get('/instrumen-1/pertanyaan-lanjutan-6/{id}', [InstrumenController::class, 'getPertanyaan6']);
    Route::get('/instrumen-1/pertanyaan-lanjutan-7/{id}', [InstrumenController::class, 'getPertanyaan7']);

    Route::get('/instrumen-1/pertanyaan-lanjutan-1/edit/{id}', [InstrumenController::class, 'editPertanyaan1']);
    Route::get('/instrumen-1/pertanyaan-lanjutan-2/edit/{id}', [InstrumenController::class, 'editPertanyaan2']);
    Route::get('/instrumen-1/pertanyaan-lanjutan-3/edit/{id}', [InstrumenController::class, 'editPertanyaan3']);
    Route::get('/instrumen-1/pertanyaan-lanjutan-4/edit/{id}', [InstrumenController::class, 'editPertanyaan4']);
    Route::get('/instrumen-1/pertanyaan-lanjutan-5/edit/{id}', [InstrumenController::class, 'editPertanyaan5']);
    Route::get('/instrumen-1/pertanyaan-lanjutan-6/edit/{id}', [InstrumenController::class, 'editPertanyaan6']);
    Route::get('/instrumen-1/pertanyaan-lanjutan-7/edit/{id}', [InstrumenController::class, 'editPertanyaan7']);

    Route::post('/instrumen-1/pertanyaan-lanjutan-1', [InstrumenController::class, 'storePertanyaan1']);
    Route::post('/instrumen-1/pertanyaan-lanjutan-2', [InstrumenController::class, 'storePertanyaan2']);
    Route::post('/instrumen-1/pertanyaan-lanjutan-3', [InstrumenController::class, 'storePertanyaan3']);
    Route::post('/instrumen-1/pertanyaan-lanjutan-4', [InstrumenController::class, 'storePertanyaan4']);
    Route::post('/instrumen-1/pertanyaan-lanjutan-5', [InstrumenController::class, 'storePertanyaan5']);
    Route::post('/instrumen-1/pertanyaan-lanjutan-6', [InstrumenController::class, 'storePertanyaan6']);
    Route::post('/instrumen-1/pertanyaan-lanjutan-7', [InstrumenController::class, 'storePertanyaan7']);

    Route::put('/instrumen-1/pertanyaan-lanjutan-1/{id}', [InstrumenController::class, 'updatePertanyaan1']);
    Route::put('/instrumen-1/pertanyaan-lanjutan-2/{id}', [InstrumenController::class, 'updatePertanyaan2']);
    Route::put('/instrumen-1/pertanyaan-lanjutan-3/{id}', [InstrumenController::class, 'updatePertanyaan3']);
    Route::put('/instrumen-1/pertanyaan-lanjutan-4/{id}', [InstrumenController::class, 'updatePertanyaan4']);
    Route::put('/instrumen-1/pertanyaan-lanjutan-5/{id}', [InstrumenController::class, 'updatePertanyaan5']);
    Route::put('/instrumen-1/pertanyaan-lanjutan-6/{id}', [InstrumenController::class, 'updatePertanyaan6']);
    Route::put('/instrumen-1/pertanyaan-lanjutan-7/{id}', [InstrumenController::class, 'updatePertanyaan7']);

    Route::get('/instrumen-2', [InstrumenController::class, 'index2']);
    Route::get('/instrumen-2/create', [InstrumenController::class, 'create2']);
    Route::post('/instrumen-2', [InstrumenController::class, 'store2']);
    Route::get('/instrumen-2/{id}', [InstrumenController::class, 'edit2']);
    Route::put('/instrumen-2/{id}', [InstrumenController::class, 'update2']);
    Route::get('/instrumen-2/delete/{id}', [InstrumenController::class, 'destroy2']);
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
