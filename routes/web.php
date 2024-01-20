<?php

use App\Http\Controllers\KonsultasiController;
use App\Http\Controllers\KriteriaLahanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RulesController;
use App\Http\Controllers\SayuranController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::prefix('data-master')->group(function () {
    Route::prefix('sayuran')->group(function () {
        Route::get('/', [SayuranController::class, "index"])->name("sayuran.index");
        Route::get('/{sayuran:kd}/show', [SayuranController::class, "show"])->name("sayuran.show");
        Route::post('/', [SayuranController::class, "store"])->name("sayuran.store");
        Route::delete('/{sayuran:kd}', [SayuranController::class, "destroy"])->name("sayuran.destroy");
        Route::get('/{sayuran:kd}/edit', [SayuranController::class, "edit"])->name("sayuran.edit");
        Route::put('/{sayuran:kd}/update', [SayuranController::class, "update"])->name("sayuran.update");
    });
    Route::prefix('kriteria-lahan')->group(function () {
        Route::get('/', [KriteriaLahanController::class, "index"])->name("kriteriaLahan.index");
        Route::get('/{kriteriaLahan:kd}/show', [KriteriaLahanController::class, "show"])->name("kriteriaLahan.show");
        Route::post('/', [KriteriaLahanController::class, "store"])->name("kriteriaLahan.store");
        Route::delete('/{kriteriaLahan:kd}', [KriteriaLahanController::class, "destroy"])->name("kriteriaLahan.destroy");
        Route::get('/{kriteriaLahan:kd}/edit', [KriteriaLahanController::class, "edit"])->name("kriteriaLahan.edit");
        Route::put('/{kriteriaLahan:kd}/update', [KriteriaLahanController::class, "update"])->name("kriteriaLahan.update");
    });
    Route::prefix('rules')->group(function () {
        Route::get('/', [RulesController::class, "index"])->name("rules.index");
        Route::post('/', [RulesController::class, "store"])->name("rules.store");
        Route::delete('/{rule:kd}/hapus', [RulesController::class, "destroy"])->name("rules.destroy");
    });
});
Route::prefix('analisis')->group(function () {
    Route::prefix('konsultasi')->group(function () {
        Route::get('/', [KonsultasiController::class, "index"])->name("konsultasi.index");
        Route::get('/{konsultasi:kd}/detail', [KonsultasiController::class, "show"])->name("konsultasi.show");
        Route::post('/', [KonsultasiController::class, "store"])->name("konsultasi.store");
        Route::delete('/{konsultasi:kd}/hapus', [KonsultasiController::class, "destroy"])->name("konsultasi.destroy");
    });
});
require __DIR__ . '/auth.php';
