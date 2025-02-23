<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\KunjunganController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\RekamMedisController;
use App\Http\Controllers\RekamMedisObat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('dokter', [DokterController::class, 'getDokter']);
Route::get('dokter/{id}', [DokterController::class, 'getDokterById']);
Route::post('dokter', [DokterController::class, 'storeDokter']);
Route::delete('dokter/{id}', [DokterController::class, 'destroyDokter']);
Route::put('dokter/{id}', [DokterController::class, 'updateDokter']);

Route::get('pasien', [PasienController::class, 'getPasien']);
Route::get('pasien/{id}', [PasienController::class, 'getPasienById']);
Route::post('pasien', [PasienController::class, 'storePasien']);
Route::delete('pasien/{id}', [PasienController::class, 'destroyPasien']);
Route::put('pasien/{id}', [PasienController::class, 'updatePasien']);

Route::get('obat', [ObatController::class, 'getObat']);
Route::get('obat/{id}', [ObatController::class, 'getObatById']);
Route::post('obat', [ObatController::class, 'storeObat']);
Route::delete('obat/{id}', [ObatController::class, 'destroyObat']);
Route::put('obat/{id}', [ObatController::class, 'updateObat']);

Route::get('kunjungan', [KunjunganController::class, 'getKunjungan']);
Route::get('kunjungan/{id}', [KunjunganController::class, 'getKunjunganById']);
Route::post('kunjungan', [KunjunganController::class, 'storeKunjungan']);
Route::delete('kunjungan/{id}', [KunjunganController::class, 'destroyKunjungan']);
Route::put('kunjungan/{id}', [KunjunganController::class, 'updateKunjungan']);

Route::post('login', [AuthController::class, 'login']);

Route::post('register', [AuthController::class, 'register']);
