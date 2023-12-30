<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RoleController as role;
use App\Http\Controllers\UserController as user;
use App\Http\Controllers\AuthenticationController as auth;
use App\Http\Controllers\DashboardController as dashboard;
use App\Http\Controllers\PermissionController as permission;



// Route Authentication
Route::get('/register',[auth::class,'signUpForm'])->name('register');
Route::post('/register',[auth::class,'signUpstore'])->name('register.store');
Route::get('/login',[auth::class,'signinForm'])->name('login');
Route::post('/login',[auth::class,'signInCheck'])->name('login.check');
Route::get('/logout',[auth::class,'singOut'])->name('logOut');

Route::middleware(['checkauth'])->prefix('admin')->group(function(){

    Route::get('dashboard', [dashboard::class,'index'])->name('dashboard');
   
});

Route::middleware(['checkrole'])->prefix('admin')->group(function(){
    Route::resource('user', user::class);
    Route::resource('role', role::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('blog', BlogController::class);

   
    // Route Permission
    Route::get('permission/{role}', [permission::class,'index'])->name('permission.list');
    Route::post('permission/{role}', [permission::class,'save'])->name('permission.save');

    //profile Route
    Route::get('/profile', [auth::class, 'profile'])->name('profile.index');

    Route::get('/profile/settings', [ProfileController::class, 'settings'])->name('profile.settings');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.edit');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});








