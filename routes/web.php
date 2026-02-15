<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DatasetController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/datasets', [DatasetController::class, 'index'])->name('datasets.index');
Route::get('/datasets/{id}', [DatasetController::class, 'show'])->name('datasets.show');
Route::get('/organizations', [App\Http\Controllers\OrganizationController::class, 'index'])->name('organizations.index');
