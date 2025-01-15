<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// digunakan untuk menampilkan daftar semua data berita dari tabel news di database
Route::get('/news', [NewsController::class, 'index']);  
// menerima data dari permintaan dan menyimpannya ke database(entri data baru)
Route::post('/news', [NewsController::class, 'store']);
// untuk menampilkan data berita berdasarkan id yang diberikan
Route::get('/news/{id}', [NewsController::class, 'show']);
// untuk memperbarui data berita berdasarkan id yang diberikan
Route::put('/news/{id}', [NewsController::class, 'update']);
// untuk menghapus data berita berdasarkan id yang diberikan
Route::delete('/news/{id}', [NewsController::class, 'destroy']);
// untuk registrasi akun
Route::post('/register', [AuthController::class, 'register']);
// untuk login
Route::post('/login', [AuthController::class, 'login']);