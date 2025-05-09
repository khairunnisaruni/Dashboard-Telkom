<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

//Login Register
Route::get('/', [AuthController::class, 'index'])->name('login'); // Halaman login
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register'); // Halaman register
Route::post('/register', [AuthController::class, 'register'])->name('register.process');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
