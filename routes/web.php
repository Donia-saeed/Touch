<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OperationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FavoriteController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::resource('budgets', BudgetController::class);


Route::resource('favorites', FavoriteController::class);

Route::get('profile',[UserController::class,'profile'])->name('profile');
Route::get('profile/{user}/edit', [UserController::class,'editprofile']);
Route::post('profile/{user}', [UserController::class,'updateprofile']);



Route::resource('/budgets/{budget}/operations', OperationController::class);
// Route::get('/budgets/operations/create', [OperationController::class, 'create'])->name('operations.create');
// Route::post('/budgets/{budget}/operations', [OperationController::class, 'store'])->name('operations.store');
// Route::get('/budgets/{budget}/operations/{operation}/edit', [OperationController::class, 'edit'])->name('operations.edit');
// Route::put('/budgets/{budget}/operations/{operation}', [OperationController::class, 'update'])->name('operations.update');
// Route::delete('/budgets/{budget}/operations/{operation}', [OperationController::class, 'destroy'])->name('operations.destroy');

Auth::routes();
