<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/',[PublicController::class,'home'])->name('home');

Route::get('/car', [CarController::class,'index'])->name('car.index');
Route::get('/car/create', [CarController::class,'create'])->name('car.create');
Route::get('/car/{car}', [CarController::class,'show'])->name('car.show');
Route::get('/car/edit/{car}', [CarController::class,'edit'])->name('car.edit');

Route::get('/profile', [UserController::class, 'index'])->name('user.index');
Route::get('/profile/{user}', [UserController::class, 'show'])->name('user.show');
Route::delete('/profile/delete', [UserController::class, 'userDelete'])->name('userDelete');

