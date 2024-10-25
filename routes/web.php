<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return [config('aoo.name') => app()->version()];
});
