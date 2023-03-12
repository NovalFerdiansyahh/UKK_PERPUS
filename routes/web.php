<?php

use App\Http\Controllers\AddController;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/add', [AddController::class, 'index'])->name('add');
Route::post('/add', [AddController::class, 'store'])->name('add.store');

Route::get('/tampilkandata/{id}', [AddController::class, 'tampilkandata'])->name('tampilkandata');
Route::put('/update/{id}', [AddController::class, 'update'])->name('update');

Route::get('/destroy/{id}', [AddController::class, 'destroy'])->name('destroy');

Route::get('/buku/search', [AddController::class, 'search'])->name('add.search');

Route::get('/buku/{id}', [AddController::class, 'show'])->name('add.show');
