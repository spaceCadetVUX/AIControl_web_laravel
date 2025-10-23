<?php

use App\Http\Controllers\WebController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;  

// --- Public Website Routes ---
Route::get('/', [WebController::class, 'home'])->name('home');
Route::get('/chieusang', [WebController::class, 'chieusang'])->name('chieusang');
Route::get('/index', [WebController::class, 'index'])->name('index');

// --- Admin Dashboard Routes ---
Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/products', [AdminController::class, 'products'])->name('admin.products');

