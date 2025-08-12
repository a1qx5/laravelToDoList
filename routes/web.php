<?php

use App\Http\Controllers\ListItemController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ListItemController::class, 'index'])->name('home');

Route::post('/', [ListItemController::class, 'saveItem'])->name('saveItem');

Route::post('/items/{id}/complete', [ListItemController::class, 'markComplete'])->name('items.complete');
