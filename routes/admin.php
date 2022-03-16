<?php

// use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\{WarehouseController,CategoryController,UserController,
  PurchaseController,
  UnitController,
  ProductController};

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth')->group(function(){
 
// });

 Route::resource('/users',UserController::class)->names('user');
   Route::resource('/products',ProductController::class)->names('product');
   Route::resource('/categories',CategoryController::class)->names('category');
   Route::resource('/purchases',PurchaseController::class)->names('purchase');
   Route::resource('/warehouse',WarehouseController::class)->names('warehouse');
      Route::resource('/units',UnitController::class)->names('unit');
