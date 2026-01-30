<?php

use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('pages.surat');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('pages.dashboard');
})->name('dashboard');

Route::get('/surat', function () {
    return view('pages.surat');
})->name('surat');