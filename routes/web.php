<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Route;

Route::get('/', [GuestController::class, 'index'])->name('home');
Route::get('destination/{id}', [GuestController::class, 'destination']);
Route::get('destinations', [GuestController::class, 'destinations']);
Route::get('galleries', [GuestController::class, 'galleries']);
Route::get('about-us', [GuestController::class, 'aboutUs']);
Route::get('contact', [GuestController::class, 'contact']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('index');
        
        Route::prefix('destination')->name('destination.')->group(function () {
            Route::get('/', [AdminController::class, 'destination'])->name('index');
            Route::post('/store', [AdminController::class, 'storeDestination'])->name('store');
            Route::get('/{id}', [AdminController::class, 'editDestination'])->name('edit');
            Route::put('/{id}', [AdminController::class, 'updateDestination'])->name('update');
            Route::delete('/{id}', [AdminController::class, 'destroyDestination'])->name('destroy');
        });
        Route::prefix('category')->name('category.')->group(function () {
            Route::get('/', [AdminController::class, 'category'])->name('index');
            Route::post('/store', [AdminController::class, 'storeCategory'])->name('store');
            Route::get('/{id}', [AdminController::class, 'editCategory'])->name('edit');
            Route::put('/{id}', [AdminController::class, 'updateCategory'])->name('update');
            Route::delete('/{id}', [AdminController::class, 'destroyCategory'])->name('destroy');
        });
        Route::prefix('user')->name('user.')->group(function () {
            Route::get('/', [AdminController::class, 'user'])->name('index');
            Route::post('/store', [AdminController::class, 'storeUser'])->name('store');
            Route::get('/{id}', [AdminController::class, 'editUser'])->name('edit');
            Route::put('/{id}', [AdminController::class, 'updateUser'])->name('update');
            Route::delete('/{id}', [AdminController::class, 'destroyUser'])->name('destroy');
        });
        Route::prefix('profile')->name('profile.')->group(function () {
            Route::get('/', [AdminController::class, 'profile'])->name('index');
            Route::put('/{id}', [AdminController::class, 'updateProfile'])->name('update');
            Route::get('/change-password', [AdminController::class, 'showChangePasswordForm'])->name('showChangePasswordForm');
            Route::put('/change-password/{id}', [AdminController::class, 'changePassword'])->name('changePassword');
       
        });
        Route::prefix('review')->name('review.')->group(function () {
            Route::put('/{id}', [AdminController::class, 'updateReview'])->name('update');
            
        });

    });



    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// destination,facility,category,logout

