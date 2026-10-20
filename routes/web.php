<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Aluno\DashboardController as AlunoDashboardController;
use App\Http\Controllers\Auth\ExibirLoginController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Professor\DashboardController as ProfessorDashboardController;
use App\Http\Controllers\RedirecionarDashboardController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/login', ExibirLoginController::class)->name('login');
    Route::post('/login', LoginController::class)->name('login.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/', RedirecionarDashboardController::class)->name('home');
    Route::post('/logout', LogoutController::class)->name('logout');

    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', AdminDashboardController::class)->name('dashboard');
    });

    Route::middleware('role:professor')->prefix('professor')->name('professor.')->group(function () {
        Route::get('/dashboard', ProfessorDashboardController::class)->name('dashboard');
    });

    Route::middleware('role:aluno')->prefix('aluno')->name('aluno.')->group(function () {
        Route::get('/dashboard', AlunoDashboardController::class)->name('dashboard');
    });
});
