<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\MyTransactionController;
use App\Http\Controllers\Admin\ProductGalleryController;

Route::get('/', [\App\Http\Controllers\FrontEnd\FrontEndController::class, 'index']);
Route::get('/detail/{slug}', [App\Http\Controllers\FrontEnd\FrontEndController::class, 'detailProduct'])->name('detail.product');

Auth::routes();

Route::name('admin.')->prefix('admin')->middleware('admin')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/category', CategoryController::class)->except(['show', 'create', 'edit']);
    Route::resource('/product', ProductController::class);
    Route::resource('/product.gallery', ProductGalleryController::class)->except(['create', 'show', 'edit', 'update']);
    Route::resource('/transaction', TransactionController::class);
    Route::resource('/my-transaction', MyTransactionController::class)->only('index', 'show');
    Route::name('user.')->prefix('user')->group(function() {
        Route::get('/index', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('index');
        Route::put('reset-password/{id}', [\App\Http\Controllers\Admin\UserController::class, 'resetPassword'])->name('reset-password');
    });
});

Route::name('user.')->prefix('user')->middleware('user')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::put('/change-password', [\App\Http\Controllers\User\DashboardController::class, 'changePassword'])->name('change-password');
    Route::resource('/my-transaction', MyTransactionController::class)->only('index', 'show');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
