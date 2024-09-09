<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Auth::routes();
Route::redirect('/', '/login');
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
