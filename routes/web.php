<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MaterialController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/materiales', [MaterialController::class, 'store']);
Route::put('/materiales/{codigo}', [MaterialController::class, 'update']);
Route::patch('/materiales/{codigo}', [MaterialController::class, 'update']);
Route::get('/materiales', [MaterialController::class, 'index']);