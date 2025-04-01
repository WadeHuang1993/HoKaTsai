<?php

use Illuminate\Support\Facades\Route;

Route::prefix('hokatsai-admin')->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
}); 