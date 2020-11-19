<?php

use Illuminate\Support\Facades\Route;


Route::get('/', ['App\Http\Controllers\AdminController', 'index']);
//Route::get('/cars', ['App\Http\Controllers\AdminController', 'cars']);
Route::get('/carmodels', ['App\Http\Controllers\AdminController', 'carmodels']);
Route::get('/colors', ['App\Http\Controllers\AdminController', 'colors']);
Route::get('/brands', ['App\Http\Controllers\AdminController', 'brands']);

Route::prefix('cars')->group(function () {
    Route::get('/', ['App\Http\Controllers\AdminController', 'index']);
    //Route::post('/', ['App\Http\Controllers\AdminController', 'store']); // Middlware auth
    //Route::get('/{id}', ['App\Http\Controllers\AdminController', 'show'])->where(['id' => '[0-9]+']);
    //Route::patch('/{id}', ['App\Http\Controllers\AdminController', 'update'])->where(['id' => '[0-9]+']); // Middlware auth
    //Route::delete('/{id}', ['App\Http\Controllers\AdminController', 'destroy'])->where(['id' => '[0-9]+']); // Middlware auth
});

Route::get('/test', function () {
    return response('Test route admin', 200);
});
