<?php

use App\Http\Controllers\ProfileController;
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

Route::get('super-admin', function(){
    return '<h1>Hello super-Admin<h2>';
})->middleware(['auth', 'verified', 'role:super-admin']);

Route::get('admin', function(){
    return '<h1>Hello Admin<h2>';
})->middleware(['auth', 'verified', 'role:admin']);

Route::get('karyawan', function(){
    return '<h1>Hello karyawan<h2>';
})->middleware(['auth', 'verified', 'role:karyawan']);

require __DIR__.'/auth.php';
