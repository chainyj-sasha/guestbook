<?php

use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('layout/app');
//});

use App\Http\Controllers\MainController;
Route::match(['get', 'post'], '/', [MainController::class, 'show']);
