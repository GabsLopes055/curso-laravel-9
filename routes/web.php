<?php

use App\Http\Controllers\{
    userController
};
use App\Http\Controllers\login\loginController;
use Illuminate\Support\Facades\Route;

Route::put('/users/edit', [userController::class, 'update'])->name('users.update');
Route::get('/users/{id}/edit', [userController::class, 'edit'])->name('users.edit');
Route::get('/users/create',[userController::class, 'create'])->name('users.create');
Route::post('/users/store', [userController::class, 'store'])->name('users.store');

Route::get('/', [loginController::class, 'login'])->name('login');

Route::get('/index', [userController::class, 'index'])->name('index');
Route::get('/users', [userController::class, 'listAll'])->name('users.listAll');
Route::get('/users/{id}', [userController::class, 'show'])->name('users.show');
