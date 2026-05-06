<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MasyarakatController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/',function () {
    return view('welcome');
});

//Route::resource('/data-masyarakat', MasyarakatController::class);
Route::get('/masyarakat', [MasyarakatController::class, 'index'])->name('masyarakat.index');
Route::get('/masyarakat/create', [MasyarakatController::class, 'create'])->name('masyarakat.create');
Route::post('/masyarakat', [MasyarakatController::class, 'store'])->name('masyarakat.store');
Route::get('/masyarakat/{id}/edit', [MasyarakatController::class, 'edit'])->name('masyarakat.edit');
Route::put('/masyarakat/{masyarakat}', [MasyarakatController::class, 'update'])->name('masyarakat.update');
