<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->group(static function () {

    // Guest routes
    Route::middleware('guest:admin')->group(static function () {
        // Auth routes
        Route::get('login', [\App\Http\Controllers\Admin\Auth\AuthenticatedSessionController::class, 'create'])->name('admin.login');
        Route::post('login', [\App\Http\Controllers\Admin\Auth\AuthenticatedSessionController::class, 'store']);
        // Forgot password
        Route::get('forgot-password', [\App\Http\Controllers\Admin\Auth\PasswordResetLinkController::class, 'create'])->name('admin.password.request');
        Route::post('forgot-password', [\App\Http\Controllers\Admin\Auth\PasswordResetLinkController::class, 'store'])->name('admin.password.email');
        // Reset password
        Route::get('reset-password/{token}', [\App\Http\Controllers\Admin\Auth\NewPasswordController::class, 'create'])->name('admin.password.reset');
        Route::post('reset-password', [\App\Http\Controllers\Admin\Auth\NewPasswordController::class, 'store'])->name('admin.password.update');
    });

    // Verify email routes
    Route::middleware(['auth:admin'])->group(static function () {
        Route::get('verify-email', [\App\Http\Controllers\Admin\Auth\EmailVerificationPromptController::class, '__invoke'])->name('admin.verification.notice');
        Route::get('verify-email/{id}/{hash}', [\App\Http\Controllers\Admin\Auth\VerifyEmailController::class, '__invoke'])->middleware(['signed', 'throttle:6,1'])->name('admin.verification.verify');
        Route::post('email/verification-notification', [\App\Http\Controllers\Admin\Auth\EmailVerificationNotificationController::class, 'store'])->middleware('throttle:6,1')->name('admin.verification.send');
    });

    // Authenticated routes
    Route::middleware(['auth:admin', 'verified'])->group(static function () {
        // Confirm password routes
        Route::get('confirm-password', [\App\Http\Controllers\Admin\Auth\ConfirmablePasswordController::class, 'show'])->name('admin.password.confirm');
        Route::post('confirm-password', [\App\Http\Controllers\Admin\Auth\ConfirmablePasswordController::class, 'store']);
        // Logout route
        Route::post('logout', [\App\Http\Controllers\Admin\Auth\AuthenticatedSessionController::class, 'destroy'])->name('admin.logout');
        // General routes
        Route::get('/', [\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.index');


        Route::get('/posts', [\App\Http\Controllers\Admin\AdminController::class, 'posts'])->name('admin.posts');
        Route::get('/posts/create', [\App\Http\Controllers\Admin\AdminController::class, 'create'])->name('admin.create');
        Route::post('/posts/create', [\App\Http\Controllers\Admin\AdminController::class, 'store'])->name('admin.create');
        Route::patch('/posts/{post}',  [\App\Http\Controllers\Admin\AdminController::class, 'update'])->name('admin.posts.post');
        Route::get('/posts/{post}/edit', [\App\Http\Controllers\Admin\AdminController::class, 'edit'])->name('admin.edit');
        Route::delete('/posts/{post}', [\App\Http\Controllers\Admin\AdminController::class, 'destroy'])->name('admin.posts.post');

        Route::get('/settings', [\App\Http\Controllers\Admin\AdminController::class, 'editSettings'])->name('admin.settings');
        Route::post('/update', 'App\Http\Controllers\Admin\AdminController@updateSettings')->name('admin.update');

        Route::get('/users', [\App\Http\Controllers\Admin\UsersController::class, 'users'])->name('admin.users.users');




        Route::get('profile', [\App\Http\Controllers\Admin\HomeController::class, 'profile'])->middleware('password.confirm.admin')->name('admin.profile');
    });
});
