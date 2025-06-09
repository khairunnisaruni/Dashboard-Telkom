<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TerritoryController;
use App\Http\Controllers\OCCController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OpportunityController;
use App\Http\Controllers\CbaseController;
use App\Http\Controllers\AboutController;

Route::get('/', function() {
    return redirect('/login');
});

// Login & Register
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.process');

Route::get('/forgot', [AuthController::class, 'showforgotForm'])->name('forgot');
Route::post('/forgot', [AuthController::class, 'forgot'])->name('forgot.process');

Route::post('/updateProfile', [AuthController::class, 'updateProfile'])->name('updateProfile')->middleware('auth');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->name('dashboard');
    Route::get('/territory', [TerritoryController::class, 'index'])->name('territory');
    Route::get('/occ', [OCCController::class, 'showOCC'])->name('occ');
    Route::get('/cbase', [CbaseController::class, 'showCbase'])->name('customerbase');
    Route::get('/resource', [ResourceController::class, 'showResource'])->name('resource');
    Route::get('/opportunity', [OpportunityController::class, 'showOpportunity'])->name('opportunity');
    Route::get('/about', [AboutController::class, 'showAbout'])->name('about');

    Route::post('/occ/upload', [OCCController::class, 'upload'])->name('occ.modal-upload');
    Route::post('/cbase/upload', [CbaseController::class, 'upload'])->name('customerbase.modal-upload');
    Route::post('/resource/upload', [ResourceController::class, 'upload'])->name('resource.modal-upload');
    Route::post('/opportunity/upload', [OpportunityController::class, 'modalUpload'])->name('opportunity.modal-upload');
    Route::put('/opportunity/{id}/update', [OpportunityController::class, 'update'])->name('opportunity.modal-update');
    Route::delete('/opportunity/{id}', [OpportunityController::class, 'destroy'])->name('opportunity.destroy');

});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard-user', [DashboardController::class, 'showDashboardUser'])->name('dashboard-user');
    Route::get('/territory-user', [TerritoryController::class, 'indexUser'])->name('territory-user');
    Route::get('/occ-user', [OCCController::class, 'showOCCUser'])->name('occ-user');
    Route::get('/cbase-user', [CbaseController::class, 'showCbaseUser'])->name('customerbase-user');
    Route::get('/resource-user', [ResourceController::class, 'showResourceUser'])->name('resource-user');
    Route::get('/opportunity-user', [OpportunityController::class, 'showOpportunityUser'])->name('opportunity-user');
    Route::get('/about-user', [AboutController::class, 'showAboutUser'])->name('about-user');
});
