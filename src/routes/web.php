<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('/test', 'test');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/checkers', function () {
    return view('games.checkersView');
})->name('checkers');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
