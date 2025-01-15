<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('admin')->group(function () {
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/admin', [UserController::class, 'adminPanel'])->name('user.admin');
});

Auth::routes(['register' => false]);

Route::get('/admin', function () {
    return view('home');
})->name('admin.home');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::resource('companies', CompanyController::class);
});

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::resource('employees', EmployeeController::class);
});
