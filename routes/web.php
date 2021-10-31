<?php

use App\Http\Controllers\WEB\LandingController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [LandingController::class, 'index'])->name('landing.index');

Route::post('/tambah-kategori', [LandingController::class, 'tambahKategori'])->name('landing.add.kategori');
Route::get('/list-kategori', [LandingController::class, 'listKategori'])->name('landing.list.kategori');
Route::put('/edit-kategori', [LandingController::class, 'editKategori'])->name('landing.edit.kategori');
Route::delete('/delete-kategori/{id}', [LandingController::class, 'deleteKategori'])->name('landing.delete.kategori');

Route::post('/tambah-wisata', [LandingController::class, 'tambahWisata'])->name('landing.add.wisata');
Route::put('/edit-wisata', [LandingController::class, 'editWisata'])->name('landing.edit.wisata');
Route::get('/list-wisata', [LandingController::class, 'listWisata'])->name('landing.list.wisata');
Route::delete('/delete-wisata/{id}', [LandingController::class, 'deleteWisata'])->name('landing.delete.wisata');
