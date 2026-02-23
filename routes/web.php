<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index']);

Route::get('/facilities', function () {
    return view('pages.facilities');
});

Route::get('/pricing', function () {
    return view('pages.pricing');
});
