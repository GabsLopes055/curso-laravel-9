<?php

use App\Http\Controllers\{
    userController
};
use Illuminate\Support\Facades\Route;

Route::get('/create',[userController::class, 'create'])->name('users.create');

Route::get('/', [userController::class, 'index'])->name('index');
Route::get('/users', [userController::class, 'listAll'])->name('users.listAll');
Route::get('/users/{id}', [userController::class, 'show'])->name('users.show');
