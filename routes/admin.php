<?php

use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\ServiceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\EnvironmentImageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ServiceFeeController;
use App\Http\Controllers\Admin\PartnerController;

Route::middleware(['auth:admin'])->group(function () {
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
        Route::patch('environment-images-update-order', [EnvironmentImageController::class, 'updateOrder'])->name('environment-images.updateOrder');
        Route::resource('environment-images', EnvironmentImageController::class);

        // 預約總覽
        Route::resource('appointments', AppointmentController::class);

        // 諮商 QA
        Route::resource('faqs', FaqController::class);
        Route::post('faq-update-order', [FaqController::class, 'order'])->name('faqs.order');

        // 諮商服務管理
        Route::resource('services', ServiceController::class);
        Route::post('services-update-order', [ServiceController::class, 'updateOrder'])->name('services.update-order');

        // 管理員帳號管理
        Route::resource('admin-users', AdminUserController::class);

        // 收費標準管理
        Route::patch('service-fees-update-order', [ServiceFeeController::class, 'updateOrder'])->name('service-fees.updateOrder');
        Route::resource('service-fees', ServiceFeeController::class);

        // 合作單位與合作方案管理
        Route::patch('partners-update-order', [PartnerController::class, 'updateOrder'])->name('partners.updateOrder');
        Route::resource('partners', PartnerController::class);
    });
});

// 登入頁
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.submit');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
