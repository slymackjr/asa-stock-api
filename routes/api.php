<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum','abilities:admin'])->group( function () {
    Route::get('/products',[ProductController::class,'getProducts']);
    Route::get('/product/{id}',[ProductController::class,'getProduct']);
    Route::post('/product',[ProductController::class,'addProduct']);
    Route::put('/product/{id}/update',[ProductController::class,'updateProduct']);
    Route::delete('/product/{id}/delete',[ProductController::class,'deleteProduct']);
});

Route::middleware(['auth:sanctum','abilities:user'])->group( function () {
    Route::get('/products',[ProductController::class,'getProducts']);
    Route::post('/product',[ProductController::class,'addProduct']);
});

Route::post('/login',[UserController::class,  'login']);