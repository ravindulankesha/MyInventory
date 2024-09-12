<?php

use App\Http\Controllers\AuthenticationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('homepage');
});

Route::get('/register', function () {
    return view('registerView');
});

Route::get('/login', function () {
    return view('loginView');
});

Route::get('/dashboard', function () {
    return view('landingpage');
})->name('home');

Route::post('/registerUser', [AuthenticationController::class, 'register'])->name('registerUser');

Route::post('/login', [AuthenticationController::class, 'login'])->name('loginUser');

