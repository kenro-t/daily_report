<?php

use App\Http\Controllers\Administrator\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Administrator\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Administrator\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Administrator\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Administrator\Auth\NewPasswordController;
use App\Http\Controllers\Administrator\Auth\PasswordController;
use App\Http\Controllers\Administrator\Auth\PasswordResetLinkController;
use App\Http\Controllers\Administrator\Auth\RegisteredUserController;
use App\Http\Controllers\Administrator\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->middleware('guest:administrator')
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store'])
                ->middleware('guest:administrator');

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->middleware('guest:administrator')
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store'])
                ->middleware('guest:administrator');

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->middleware('guest:administrator')
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->middleware('guest:administrator')
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->middleware('guest:administrator')
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->middleware('guest:administrator')
                ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
                ->middleware('auth:administrator')
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->middleware('auth:administrator')
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store'])
                ->middleware('auth:administrator');

    Route::put('password', [PasswordController::class, 'update'])
                ->middleware('auth:administrator')
                ->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->middleware('auth:administrator')
                ->name('logout');
});
