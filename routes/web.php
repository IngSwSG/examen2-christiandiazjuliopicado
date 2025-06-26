<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MaterialController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/materiales', [MaterialController::class, 'store']);