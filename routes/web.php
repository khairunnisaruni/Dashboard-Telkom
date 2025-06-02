<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TerritoryController;
use App\Http\Controllers\OCCController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CbaseController;
use Illuminate\Support\Facades\Auth;


Route::get('/', function() {
    return redirect('/login');
});

// Login & Register
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login'); // Halaman login
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register'); // Halaman register
Route::post('/register', [AuthController::class, 'register'])->name('register.process');

Route::get('/forgot', [AuthController::class, 'showforgotForm'])->name('forgot'); // Halaman forgot
Route::post('/forgot', [AuthController::class, 'forgot'])->name('forgot.process');

Route::post('/updateName', [AuthController::class, 'updateName'])->name('updateName')->middleware('auth');

Route::get('/tes', [AuthController::class,'showTes'])->name('tes'); // Halaman tes

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Territory Routes
Route::get('/territory', [TerritoryController::class, 'index'])->name('territory');

// OCC Routes
Route::get('/occ', [OCCController::class,'showOCC'])->name('occ');
Route::post('/occ/upload', [OCCController::class, 'upload'])->name('occ.modal-upload');

// Cbase routes
Route::get('/cbase', [CbaseController::class,'showCbase'])->name('customerbase');
Route::post('/cbase/upload', [CbaseController::class, 'upload'])->name('customerbase.modal-upload');

// Resource Routes
Route::get('/resource', [ResourceController::class,'showResource'])->name('resource');
Route::post('/resource/upload', [ResourceController::class, 'upload'])->name('resource.modal-upload');

// Dashboard Routes
Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->name('dashboard');