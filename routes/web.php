<?php

use App\Http\Controllers\Admin\MyTransaction;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductGalleryController;
use App\Http\Controllers\Admin\transactionController;
use App\Http\Controllers\AdminCategory;
use App\Models\Product;
use App\Models\ProductGallery;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

Route::get('/',[\App\Http\Controllers\Frontend\FrontendController::class, 'index']);
Route::get('/detail-product/{slug}',[\App\Http\Controllers\Frontend\FrontendController::class, 'detailProduct'])->name('detail.product');
Route::get('/detail-category/{slug}',[\App\Http\Controllers\Frontend\FrontendController::class, 'detailCategory'])->name('detail.category');

Auth::routes();

Route::middleware('auth')->group(function(){
    Route::get('/cart',[\App\Http\Controllers\Frontend\FrontendController::class, 'cart'])->name('cart');
    Route::post('/addTocart/{id}',[\App\Http\Controllers\Frontend\FrontendController::class, 'addToCart'])->name('addtocart');
    Route::delete('/cart/{id}',[\App\Http\Controllers\Frontend\FrontendController::class, 'deleteCart'])->name('deletecart');
    Route::post('/checkout',[\App\Http\Controllers\Frontend\FrontendController::class, 'checkout'])->name('checkout');
});

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::name('admin.')->prefix('admin')->middleware('admin')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Admin\Dashboard::class, 'index'])->name('dashboard');
    Route::put('/reset-password/{id}',[\App\Http\Controllers\Admin\Dashboard::class, 'resetpassword'])->name('resetpassword');
    Route::resource('/category', AdminCategory::class)->except('create','show','edit');
    Route::resource('/product', ProductController::class)->except('create','show','edit');
    Route::resource('/product.gallery',ProductGalleryController::class)->except('create','show','edit','update');
    Route::resource('/mytransaction',MyTransaction::class)->only('index');
    Route::get('/mytransaction/{id}/{slug}',[MyTransaction::class,'showDataBySlugAndId'])->name('mytransaction.showDataBySlugAndId');
    Route::resource('/transaction',transactionController::class);
});

Route::name('user.')->prefix('user')->middleware('user')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\user\Dashboardcontroller::class, 'index'])->name('dashboard');
    Route::resource('/mytransaction',MyTransaction::class)->only('index');
    Route::get('/mytransaction/{id}/{slug}',[MyTransaction::class,'showDataBySlugAndId'])->name('mytransaction.showDataBySlugAndId');
});

Route::middleware('auth')->group(function () {
    Route::get('/change-password',[\App\Http\Controllers\Profile\ProfileController::class, 'changePassword'])->name('profile.change-password');
    Route::put('/update-password',[\App\Http\Controllers\Profile\ProfileController::class, 'updatePassword'])->name('profile.update-password');
});


