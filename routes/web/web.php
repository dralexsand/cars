<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return response('Test route web home page', 200);
});

