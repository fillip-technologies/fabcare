<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
});


Route::get('/facilities', function () {
    return view('pages.facilities');
});

Route::get('/pricing', function () {
    return view('pages.pricing');
});
