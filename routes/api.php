<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/products',[ProductController::class,'getProducts']);
Route::post('/product',[ProductController::class,'addProduct']);
Route::put('/product/{id}/update',[ProductController::class,'updateProduct']);
Route::delete('/product/{id}/delete',[ProductController::class,'deleteProduct']);
