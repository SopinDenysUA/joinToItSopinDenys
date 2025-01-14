<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('admin')->group(function () {
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/admin', [UserController::class, 'adminPanel'])->name('user.admin');
});
