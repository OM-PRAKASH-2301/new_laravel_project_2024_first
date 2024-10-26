<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminLoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/login', [AdminLoginController::class, 'index'])->name('admin.login');

Route::post('/admin/login', [AdminLoginController::class, 'login']);

Route::get('/admin/register', [AdminLoginController::class, 'showRegisterForm'])->name('admin.register.form'); 

Route::post('/admin/register', [AdminLoginController::class, 'register'])->name('admin.register');