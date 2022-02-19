<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController;
Route::match(['get', 'post'], '/', [MainController::class, 'insert']);
Route::match(['get', 'post'], '/admin', [MainController::class, 'admin']);
Route::match(['get', 'post'], '/edit/{id}', [MainController::class, 'editMessage'])->where('id', '\d+');
Route::match(['get', 'post'], '/delete/{id}', [MainController::class, 'delMessage'])->where('id', '\d+');
