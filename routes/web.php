<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OperationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FavoriteController;

Route::get('/', [HomeController::class, 'index'])->name('home');
// Route::get('operations/{id}', [OperationController::class,'specificBuget'])->name('specificBuget');
Route::resource('budgets', BudgetController::class);
Route::resource('operations', OperationController::class);
Route::resource('favorites', FavoriteController::class);

Route::get('profile',[UserController::class,'profile'])->name('profile');
Route::get('profile/{user}/edit', [UserController::class,'editprofile']);
Route::post('profile/{user}', [UserController::class,'updateprofile']);

Auth::routes();
