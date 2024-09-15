<?php

use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Auth\AuthenticateController;
use App\Http\Controllers\Profile\EmailPasswordController;
use App\Http\Controllers\Profile\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/welcome', function () {
    return view('welcome');
});

Route::prefix('account')->middleware('authenticate')->group(function(){
    Route::prefix('/profile')->controller(ProfileController::class)->group(function(){
        Route::get('/', 'detail')->name('profile.detail');
        Route::patch('/update', 'update')->name('profile.update');
    });
    Route::prefix('/email-password')->controller(EmailPasswordController::class)->group(function(){
        Route::get('/', 'index')->name('profile.email-password');
        Route::patch('/update-email', 'updateEmail')->name('profile.email-password.update-email');
        Route::patch('/update-password', 'updatePassword')->name('profile.email-password.update-password');
    });
});

Route::controller(AuthenticateController::class)->group(function(){
    Route::get('/login', 'login')->name('login')->middleware('guest');
    Route::post('/login', 'store')->middleware('guest');
    Route::post('/logout', 'destroy')->name('logout')->middleware('authenticate');
});

Route::prefix('admin')->middleware('admin')->group(function(){
    Route::controller(\App\Http\Controllers\Admin\DashboardController::class)->group(function(){
        Route::get('/dashboard', 'index')->name('admin.dashboard');   
    });

    Route::resource('users', UsersController::class);
    Route::resource('categories', CategoriesController::class);
    Route::resource('products', ProductsController::class);

});

Route::middleware('authenticate')->group(function(){
    Route::controller(\App\Http\Controllers\User\DashboardController::class)->group(function(){
        Route::get('/dashboard', 'index')->name('user.dashboard');   
    });
});