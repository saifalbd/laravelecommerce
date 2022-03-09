<?php

// use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\{WereHouseController,UserController,ProductController};

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth')->group(function(){
 
// });

 Route::resource('/users',UserController::class)->names('user');
   Route::resource('/products',ProductController::class)->names('product');
   Route::resource('/categories',CategoryController::class)->names('category');
   Route::resource('/purchases',CategoryController::class)->names('purchase');
   Route::resource('/warehouse',WereHouseController::class)->names('warehouse');
