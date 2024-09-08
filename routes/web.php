<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilterController;



Route::get('/', [FilterController::class, 'index'])->name('filter.index');
Route::post('/filter', [FilterController::class, 'filter'])->name('filter');
