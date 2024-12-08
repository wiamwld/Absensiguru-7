<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\GuruController;
use App\Http\Controllers\Api\AbsensiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('guru', [GuruController::class, 'index']);
Route::post('guru', [GuruController::class, 'store']);
Route::get('guru/{id}',[GuruController::class,'show']);
Route::get('absensi', [AbsensiController::class, 'index']);
Route::post('absensi', [AbsensiController::class, 'store']);
Route::get('absensi/{id}',[AbsensiController::class,'show']);
Route::put('absensi/{id}', [AbsensiController::class, 'update']);
Route::delete('absensi/{id}', [AbsensiController::class, 'destroy']);