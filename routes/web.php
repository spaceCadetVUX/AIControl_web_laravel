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
    Route::get('/api/products/autocomplete', 'autocomplete')->name('product.autocomplete');
});

// ----------------------------
// PROFILE PAGES (protected by auth)
// ----------------------------
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile/verify-recovery-email', [ProfileController::class, 'verifyRecoveryEmail'])->name('profile.verify-recovery-email');
});

// ----------------------------
// ADMIN LOGIN (for guests)
// ----------------------------
Route::middleware(['guest'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', function () {
        return view('auth.admin-login');
    })->name('login');
});

// ----------------------------
// ADMIN PAGES (protected by auth and admin middleware)
// ----------------------------
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Manage pages
    Route::get('/pages', [DashboardController::class, 'pages'])->name('pages');
    Route::post('/pages/update', [DashboardController::class, 'update'])->name('pages.update');

    // Manage users
    Route::get('/users', [DashboardController::class, 'users'])->name('users');
    Route::post('/users/{user}/toggle-status', [DashboardController::class, 'toggleUserStatus'])->name('users.toggle-status');

    // Manage products
    Route::get('/products', [DashboardController::class, 'products'])->name('products');
    Route::get('/products/create', [DashboardController::class, 'createProduct'])->name('products.create');
    Route::post('/products', [DashboardController::class, 'storeProduct'])->name('products.store');
    Route::get('/products/{product}/edit', [DashboardController::class, 'editProduct'])->name('products.edit');
    Route::put('/products/{product}', [DashboardController::class, 'updateProduct'])->name('products.update');
    Route::delete('/products/{product}', [DashboardController::class, 'deleteProduct'])->name('products.delete');
    Route::post('/products/{product}/toggle-status', [DashboardController::class, 'toggleProductStatus'])->name('products.toggle-status');

    // Manage brands
    Route::get('/brands', [DashboardController::class, 'brands'])->name('brands');
    Route::get('/brands/create', [DashboardController::class, 'createBrand'])->name('brands.create');
    Route::post('/brands', [DashboardController::class, 'storeBrand'])->name('brands.store');
    Route::get('/brands/{brand}/edit', [DashboardController::class, 'editBrand'])->name('brands.edit');
    Route::put('/brands/{brand}', [DashboardController::class, 'updateBrand'])->name('brands.update');
    Route::delete('/brands/{brand}', [DashboardController::class, 'deleteBrand'])->name('brands.delete');

    // Upload image
    Route::post('/upload-image', [DashboardController::class, 'uploadImage'])->name('upload.image');
});

require __DIR__.'/auth.php';
