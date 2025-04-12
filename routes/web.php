<?php

use App\Http\Controllers\Admin\BouquetController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Frontend\CategoryController as FrontendCategoryController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\FrontendCartController;
use App\Http\Controllers\Frontend\FrontendPageController;
use App\Http\Controllers\Frontend\FrontendShopController;
use App\Http\Controllers\Frontend\HomeController as FrontendHomeController;
use App\Http\Controllers\Frontend\SearchController;
use App\Http\Controllers\ReviewController;
use App\Models\CategoryController as ModelsCategoryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

// Frontend Routes(User Part)

Route::get('/', [FrontendHomeController::class, 'home'])->name('frontend.home');


Route::get('/shop', [FrontendShopController::class, 'index'])->name('frontend.pages.shop');

Route::get('/about', [FrontendPageController::class, 'about'])->name('frontend.pages.about');
Route::get('/contact', [FrontendPageController::class, 'contact'])->name('frontend.pages.contact');

Route::get('/search', [SearchController::class, 'search'])->name('search');


// Cart actions
Route::get('/cart', [FrontendCartController::class, 'index'])->name('frontend.pages.cart');
Route::post('/cart/add/{id}', [FrontendCartController::class, 'add'])->name('cart.add');
Route::get('/cart/remove/{id}', [FrontendCartController::class, 'remove'])->name('cart.remove');
Route::get('/cart/clear', [FrontendCartController::class, 'clear'])->name('cart.clear');



// Dashboard Route
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Users
    Route::resource('users', UserController::class)->names('users');
});

Route::post('/contact/store', [ContactController::class, 'store'])->name('frontend.contact.store');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Users
    Route::resource('users', UserController::class);

    // Bouquets
    Route::resource('bouquets', BouquetController::class);

    // Messages
    Route::resource('messages', ContactMessageController::class)->only(['index', 'show']);
});


Route::post('/bouquet/{id}/review', [ReviewController::class, 'store'])->name('reviews.store')->middleware('auth');

Route::get('/bouquets/{id}', [BouquetController::class, 'show'])->name('bouquet.details');



Route::get('/category/{id}/bouquets', [FrontendCategoryController::class, 'showBouquets'])->name('category.bouquets');


