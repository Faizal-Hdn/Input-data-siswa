<?php

use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\SiswaController;
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

Route::resource('siswa',  PendaftaranController::class);
Route::resource('/', SiswaController::class);
Route::get('siswa/{no_pendaftaran}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
Route::put('siswa/{no_pendaftaran}', [SiswaController::class, 'update'])->name('siswa.update');