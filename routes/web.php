<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');

});


Route::view('/login', 'auth.login'); // Login page
Route::view('/register', 'auth.register'); // Register page

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
