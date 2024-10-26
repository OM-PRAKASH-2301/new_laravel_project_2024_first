<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\user\UserController;

// C:\xampp\htdocs\laravel_onlie_shop\app\Http\Controllers\user\UserController.php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/login', [AdminLoginController::class, 'index'])->name('admin.login');

Route::post('/admin/login', [AdminLoginController::class, 'login']);

Route::get('/admin/register', [AdminLoginController::class, 'showRegisterForm'])->name('admin.register.form'); 

Route::post('/admin/register', [AdminLoginController::class, 'register'])->name('admin.register');

Route::get('user/register', [UserController::class, 'showRegistrationForm'])->name('user.register.form');

Route::post('/user/register', [UserController::class, 'register'])->name('user.register');

