<?php

use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
    return response('Test route user', 200);
});
