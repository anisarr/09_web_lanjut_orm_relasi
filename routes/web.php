<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Http\Request;
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

Route::resource('mahasiswa', MahasiswaController::class);
// Route::delete('/mahasiswa/delete/{mahasiswa}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy')
Route::get('/mahasiswa/nilai/{mahasiswa}', [MahasiswaController::class, 'krs'])->name('mahasiswa.krs');
// Route::get('/', function () {
//     return view('welcome')
// });

// Route::group'[]);
