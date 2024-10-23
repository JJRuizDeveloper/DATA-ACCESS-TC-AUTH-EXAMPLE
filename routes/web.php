<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [TodoController::class, 'index'])->name('dashboard');
    Route::post('/dashboard', [TodoController::class, 'store'])->name('store');
    Route::delete('/dashboard/{id}', [TodoController::class, 'destroy'])->name('destroy');
});
