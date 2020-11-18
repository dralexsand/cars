<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response('Test route admin', 200);
});
