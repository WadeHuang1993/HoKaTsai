<?php

use App\Http\Controllers\Admin\AppointmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\EnvironmentImageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\CourseController;

Route::prefix('hokatsai-admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // 最新消息管理
    Route::resource('news', NewsController::class);

    // 諮商專欄管理
    Route::resource('articles', ArticleController::class);

    // 團隊成員管理
    Route::resource('team-members', TeamMemberController::class);

    // 課程講座管理
    Route::resource('courses', CourseController::class);

    // 環境照片管理
    Route::resource('environment-images', EnvironmentImageController::class);

    // 預約總覽
    Route::resource('appointments', AppointmentController::class);
});
