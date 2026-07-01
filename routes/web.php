<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TaskController::class, 'index'])->name('index');

//Todo List Routes autenticated
Route::middleware('auth')->group(function () {
    Route::get('/create', [TaskController::class, 'create'])->name('create');
    Route::post('/store', [TaskController::class, 'store'])->name('store');
    Route::get('/show/{id}', [TaskController::class, 'show'])->name('show');
    Route::get('/edit/{id}', [TaskController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [TaskController::class, 'update'])->name('update');
    Route::get('/fav/{id}', [TaskController::class, 'fav'])->name('fav');
    Route::get('/status/{id}', [TaskController::class, 'status'])->name('status');
    Route::post('/delete/{id}', [TaskController::class, 'destroy'])->name('delete');
});

Route::get('/dashboard', function () {
    return redirect()->route('index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
