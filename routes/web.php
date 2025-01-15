<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\HomeController;
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

/*Route::get('/home', [HomeController::class, 'index'])->name('home');*/
Route::get('/admin', function () {
    return view('home');
})->name('admin.home');

Route::prefix('admin/companies')->middleware('auth')->group(function () {
    Route::get('/', [CompanyController::class, 'index'])->name('companies.index');
    Route::get('/create', [CompanyController::class, 'create'])->name('companies.create');
    Route::post('/', [CompanyController::class, 'store'])->name('companies.store');
    Route::get('{company}/edit', [CompanyController::class, 'edit'])->name('companies.edit');
    Route::put('{company}', [CompanyController::class, 'update'])->name('companies.update');
    Route::delete('{company}', [CompanyController::class, 'destroy'])->name('companies.destroy');
});

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::resource('employees', EmployeeController::class);
});
