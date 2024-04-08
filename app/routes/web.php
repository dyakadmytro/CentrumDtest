<?php

use App\Models\Anchor;
use App\Facades\AnchorServiceFacade;
use \App\Http\Controllers\AnchorController;
use \App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/s/{slug}', function () {})->middleware('slug')->name('slug');

Route::post('/login', [AuthController::class, 'login'])->name('login.form');
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::middleware(['auth'])->group(function () {
    Route::post('/anchor/store', [AnchorController::class, 'store'])->name('anchor.store');

    Route::get('/anchor/create', fn() => view('anchor-create'))->name('anchor.create');
    Route::get('/anchor/list', fn() => view('anchor-list', [
        'anchors' => Anchor::all()
    ]))->name('anchor.list');

});


