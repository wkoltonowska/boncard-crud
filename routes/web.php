<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardController;

Route::inertia('/', 'Welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');
    Route::resource('cards', CardController::class);
    
});

require __DIR__.'/settings.php';



