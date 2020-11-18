<?php

use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
    return response('Test route admin', 200);
});
