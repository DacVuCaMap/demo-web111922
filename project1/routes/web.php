<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Adminlogin;

Route::prefix('/')->name('user.')->group(function(){
    Route::get('home',[HomeController::class,'homepage'])->name('home');
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/login', [UserController::class, 'postlogin'])->name('postlogin');
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/register',[UserController::class,'register'])->name('register');
});

Route::prefix('admin')->middleware('admin.login')->name('admin.')->group(function(){
    Route::get('/home', [AdminController::class, 'home'])->name('home');

});

Route::prefix('admin/category')->middleware('admin.login')->name('category.')->group(function(){
    Route::get('/list', [CategoryController::class, 'list'])->name('list');
    Route::get('/add', [CategoryController::class, 'add'])->name('add');
    Route::post('/add', [CategoryController::class, 'postadd']);
    Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
    Route::post('/edit/{id}', [CategoryController::class, 'postedit']);
    Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('delete');
});

Route::prefix('admin/product')->middleware('admin.login')->name('product.')->group(function(){
    Route::get('/list', [ProductController::class, 'list'])->name('list');
    Route::get('/add', [ProductController::class, 'add'])->name('add');
    Route::post('/add', [ProductController::class, 'postadd']);
    Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
    Route::post('/edit/{id}', [ProductController::class, 'postedit']);
    Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('delete');
});




