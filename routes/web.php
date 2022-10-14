<?php

use App\Http\Controllers\{
    AuthController,
    cepController,
    userController
};

use App\Http\Controllers\Admin\CommentController;

use App\Http\Controllers\login\loginController;
use Illuminate\Support\Facades\Route;

Route::get('/users/{id}/comments/create',[CommentController::class, 'create'])->name('comments.create');
Route::post('/users/{id}/comments/store',[CommentController::class, 'store'])->name('comment.store');
Route::get('/users/{id}/comments',[CommentController::class, 'index'])->name('comments.index');
Route::get('/users/{user}/comments/{id}',[CommentController::class, 'edit'])->name('comments.edit');
Route::put('/users/comments/{id}',[CommentController::class, 'update'])->name('comments.update');


Route::get('/users/{id}/cep',[cepController::class, 'index'])->name('cep.listAll');
Route::get('/users/{id}/cep/create',[cepController::class, 'create'])->name('cep.create');

Route::post('/users/{id}/cep/store', [cepController::class, 'store'])->name('cep.store');

Route::get('/users/delete/{id}', [userController::class, 'delete'])->name('users.delete');
Route::delete('/users/destroy/{id}', [userController::class, 'destroy'])->name('users.destroy');
Route::put('/users/edit/{id}', [userController::class, 'update'])->name('users.update');
Route::get('/users/{id}/edit', [userController::class, 'edit'])->name('users.edit');
Route::get('/users/create', [userController::class, 'create'])->name('users.create');
Route::post('/users/store', [userController::class, 'store'])->name('users.store');

Route::get('/', [AuthController::class, 'login'])->name('login');

Route::get('/index', [userController::class, 'index'])->name('index');
Route::get('/users', [userController::class, 'listAll'])->name('users.listAll');
Route::get('/users/{id}', [userController::class, 'show'])->name('users.show');

Route::post('/auth', [AuthController::class, 'auth'])->name('auth.user');
