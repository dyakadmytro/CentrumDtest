<?php

use \App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::post('/login', [AuthController::class, 'login'])->name('login.form');
Route::get('/login', function () {
    return view('login');
})->name('login');


