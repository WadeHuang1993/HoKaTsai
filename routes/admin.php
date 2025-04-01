<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\ArticleController;

Route::prefix('hokatsai-admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // 最新消息管理
    Route::resource('news', NewsController::class);
    
    // 諮商專欄管理
    Route::resource('articles', ArticleController::class);
}); 