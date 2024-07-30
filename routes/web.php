<?php

use Illuminate\Support\Facades\Route;
use App\Rahman;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/rahman', function() {
    return Rahman::capitalize('abdurrahman');
});

Route::get('/pakaian', [App\Http\Controllers\API\GreetingPakaianController::class, 'index']);
Route::get('/greetings', [App\Http\Controllers\API\GreetingPakaianController::class, 'logGreetings']);
