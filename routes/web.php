<?php

use App\Http\Controllers\BidangOlahragaController;
use App\Http\Controllers\BimbinganSosialController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KeagamaanController;
use App\Http\Controllers\KedisiplinanController;
use App\Http\Controllers\KemandirianEmosionalController;
use App\Http\Controllers\KemandirianNilaiController;
use App\Http\Controllers\KemandirianPerilakuController;
use App\Http\Controllers\OlahragaController;
use App\Http\Controllers\PemeliharaanKesehatanController;
use App\Http\Controllers\UserController;

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

Route::get('/', [DashboardController::class, 'root'])->name('index');
Route::get('/dashboard', [DashboardController::class, 'root'])->name('index');

Route::get('{any}', [DashboardController::class, 'index']);
//Language Translation

// Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);

Route::post('/formsubmit', [App\Http\Controllers\HomeController::class, 'FormSubmit'])->name('FormSubmit');

Route::name('dashboard.')->prefix('dashboard')->group(function () {
    // Route::get('/', [DashboardController::class, 'root'])->name('index');

    Route::resource('user', UserController::class);
    Route::resource('olahraga', OlahragaController::class);
    Route::resource('bidang-olahraga', BidangOlahragaController::class)->except('index');
    Route::resource('pemeliharaan-kesehatan', PemeliharaanKesehatanController::class);
    Route::resource('keagamaan', KeagamaanController::class);
    Route::resource('kedisiplinan', KedisiplinanController::class);
    Route::resource('bimbingan-sosial', BimbinganSosialController::class);
    Route::resource('kemandirian-emosional', KemandirianEmosionalController::class);
    Route::resource('kemandirian-perilaku', KemandirianPerilakuController::class);
    Route::resource('kemandirian-nilai', KemandirianNilaiController::class);
});
