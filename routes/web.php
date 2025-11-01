<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\PageController;
use App\Http\Controllers\Front\ProductController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes handle both front-end (public pages)
| and admin pages (authenticated users).
|
*/

// ----------------------------
// FRONT PAGES (public)
// ----------------------------
Route::controller(PageController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/abb', 'abb')->name('abb');
    Route::get('/legrand', 'legrand')->name('legrand');
    Route::get('/cp-electronics', 'cpElectronics')->name('cpElectronics');
    Route::get('/vantage', 'vantage')->name('vantage');
    Route::get('/dieu-khien-chieu-sang', 'lightingControl')->name('lightingControl');
    Route::get('/rem-tu-dong', 'shade')->name('shade');
    Route::get('/dieu-khien-hvac', 'hvacControl')->name('hvacControl');
    Route::get('/he-thong-an-ninh', 'security')->name('security');
    Route::get('/contact', 'contact')->name('contact');
});

// ----------------------------
// PRODUCT PAGES
// ----------------------------
Route::controller(ProductController::class)->group(function () {
    Route::get('/shop', 'index')->name('shop');
    Route::get('/product/{slug}', 'show')->name('product.show');
    Route::get('/brand/{brand}', 'byBrand')->name('brand.products');
    Route::get('/search', 'search')->name('product.search');
});

// ----------------------------
// PROFILE PAGES (protected by auth)
// ----------------------------
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ----------------------------
// ADMIN PAGES (protected by auth)
// ----------------------------
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Example: manage pages
    Route::get('/pages', [DashboardController::class, 'pages'])->name('pages');
    Route::post('/pages/update', [DashboardController::class, 'update'])->name('pages.update');
});

require __DIR__.'/auth.php';
