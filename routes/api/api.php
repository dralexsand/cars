<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::get('/test', function () {
    return response('Test route api', 200);
});

Route::prefix('cars')->group(function () {
    Route::get('/', ['App\Http\Controllers\Api\v1\CarsController', 'index']);
    Route::post('/', ['App\Http\Controllers\Api\v1\CarsController', 'store']); // Middlware auth
    Route::get('/{id}', ['App\Http\Controllers\Api\v1\CarsController', 'show'])->where(['id' => '[0-9]+']);
    Route::patch('/{id}', ['App\Http\Controllers\Api\v1\CarsController', 'update'])->where(['id' => '[0-9]+']); // Middlware auth
    Route::delete('/{id}', ['App\Http\Controllers\Api\v1\CarsController', 'destroy'])->where(['id' => '[0-9]+']); // Middlware auth
});

Route::prefix('brands')->group(function () {
    Route::get('/', ['App\Http\Controllers\Api\v1\BrandsController', 'index']);
    Route::post('/', ['App\Http\Controllers\Api\v1\BrandsController', 'store']); // Middlware auth
    Route::get('/{id}', ['App\Http\Controllers\Api\v1\BrandsController', 'show'])->where(['id' => '[0-9]+']);
    Route::patch('/{id}', ['App\Http\Controllers\Api\v1\BrandsController', 'update'])->where(['id' => '[0-9]+']); // Middlware auth
    Route::delete('/{id}', ['App\Http\Controllers\Api\v1\BrandsController', 'destroy'])->where(['id' => '[0-9]+']); // Middlware auth
});

Route::prefix('colors')->group(function () {
    Route::get('/', ['App\Http\Controllers\Api\v1\ColorsController', 'index']);
    Route::post('/', ['App\Http\Controllers\Api\v1\ColorsController', 'store']); // Middlware auth
    Route::get('/{id}', ['App\Http\Controllers\Api\v1\ColorsController', 'show'])->where(['id' => '[0-9]+']);
    Route::patch('/{id}', ['App\Http\Controllers\Api\v1\ColorsController', 'update'])->where(['id' => '[0-9]+']); // Middlware auth
    Route::delete('/{id}', ['App\Http\Controllers\Api\v1\ColorsController', 'destroy'])->where(['id' => '[0-9]+']); // Middlware auth
});

Route::prefix('carmodels')->group(function () {
    Route::get('/', ['App\Http\Controllers\Api\v1\CarmodelsController', 'index']);
    Route::post('/', ['App\Http\Controllers\Api\v1\CarmodelsController', 'store']); // Middlware auth
    Route::get('/{id}', ['App\Http\Controllers\Api\v1\CarmodelsController', 'show'])->where(['id' => '[0-9]+']);
    Route::patch('/{id}', ['App\Http\Controllers\Api\v1\CarmodelsController', 'update'])->where(['id' => '[0-9]+']); // Middlware auth
    Route::delete('/{id}', ['App\Http\Controllers\Api\v1\CarmodelsController', 'destroy'])->where(['id' => '[0-9]+']); // Middlware auth
});

Route::prefix('transmissions')->group(function () {
    Route::get('/', ['App\Http\Controllers\Api\v1\TransmissionsController', 'index']);
    Route::post('/', ['App\Http\Controllers\Api\v1\TransmissionsController', 'store']); // Middlware auth
    Route::get('/{id}', ['App\Http\Controllers\Api\v1\TransmissionsController', 'show'])->where(['id' => '[0-9]+']);
    Route::patch('/{id}', ['App\Http\Controllers\Api\v1\TransmissionsController', 'update'])->where(['id' => '[0-9]+']); // Middlware auth
    Route::delete('/{id}', ['App\Http\Controllers\Api\v1\TransmissionsController', 'destroy'])->where(['id' => '[0-9]+']); // Middlware auth
});

Route::prefix('photos')->group(function () {
    Route::get('/', ['App\Http\Controllers\Api\v1\PhotosController', 'index']);
    Route::post('/', ['App\Http\Controllers\Api\v1\PhotosController', 'store']); // Middlware auth
    Route::get('/{id}', ['App\Http\Controllers\Api\v1\PhotosController', 'show'])->where(['id' => '[0-9]+']);
    Route::patch('/{id}', ['App\Http\Controllers\Api\v1\PhotosController', 'update'])->where(['id' => '[0-9]+']); // Middlware auth
    Route::delete('/{id}', ['App\Http\Controllers\Api\v1\PhotosController', 'destroy'])->where(['id' => '[0-9]+']); // Middlware auth
});


Route::prefix('filter')->group(function () {
    Route::post('/data', ['App\Http\Controllers\Api\v1\FilterController', 'filteredData']);
});


