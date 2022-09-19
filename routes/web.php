<?php

use App\Http\Controllers\{
    userController
};
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/users', [userController::class, 'index'])->name('users.index');
Route::get('/users/{id}', [userController::class, 'show'])->name('users.show');
