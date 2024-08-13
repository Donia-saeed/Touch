<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OperationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FavoriteController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::resource('budgets', BudgetController::class);
Route::resource('operations', OperationController::class);
Route::resource('users', UserController::class);
Route::resource('favorites', FavoriteController::class);
Auth::routes();
