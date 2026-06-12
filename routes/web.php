<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\QuizController;
use App\Http\Middleware\CheckLogin;

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLogin')->name('login');
    Route::post('/login', 'login')->name('login.store');
    Route::get('/register', 'showRegister')->name('register');
    Route::post('/register', 'register')->name('register.store');
    Route::post('/logout', 'logout')->name('logout');
});

Route::middleware(CheckLogin::class)->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('notes')->name('notes.')->controller(NoteController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::post('/upload', 'upload')->name('upload');
        Route::get('/{id}', 'show')->name('show');
        Route::get('/{id}/summary', 'summary')->name('summary');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });

    Route::prefix('quiz')->name('quiz.')->controller(QuizController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{id}', 'show')->name('show');
        Route::post('/{id}/submit', 'submit')->name('submit');
    });

    Route::get('/notes/{id}/quiz', [QuizController::class, 'generate'])->name('quiz.generate');
});
