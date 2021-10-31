<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\KategoriController;
use App\Http\Controllers\API\WisataController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Autentikasi
Route::post('/login', [AuthController::class, 'login']);
Route::post('/regis', [AuthController::class, 'regis']);
Route::put('/edit-profile/{id}', [AuthController::class, 'editUser']);
Route::put('/change-pass/{id}', [AuthController::class, 'editPass']);

// Kategori
Route::post('/add-kategori', [KategoriController::class, 'addKategori']);
Route::get('/kategori', [KategoriController::class, 'getKategori']);

//Wisata
// Route::post('/add-wisata', [WisataController::class, 'addWisata']);
Route::get('/wisata', [WisataController::class, 'getWisata']);
Route::get('/wisata-per-kategori/{id}', [WisataController::class, 'getWisataPerKategori']);
