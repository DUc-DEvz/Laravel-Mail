<?php

use App\Http\Controllers\Web\NotificationController;
use App\Http\Controllers\Web\AuthController;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\InvoiceController;
use App\Http\Controllers\Web\OrderController;

Route::get('/', [HomeController::class, 'redirectToHome']);
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware('guest')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/register', 'showRegistrationForm')->name('register.form');
        Route::post('/register', 'register')->name('register');

        Route::get('/login', 'showLoginForm')->name('login.form');
        Route::post('/login', 'login')->name('login');
    });
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/logout', fn() => abort(Response::HTTP_NOT_FOUND));
});

Route::get('/order', [OrderController::class, 'index'])->name('order');
Route::get('/invoice', [InvoiceController::class, 'index'])->name('invoice');
Route::get('/ship-order/{id}', [OrderController::class, 'shipOrder'])->name('send.order.email');

Route::get('/send-invoice-notification/{userId}/{invoiceId}', [InvoiceController::class, 'sendInvoiceNotification'])
    ->name('send-invoice-notification');

Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
Route::get('/notifications/read/{id}', [NotificationController::class, 'markAsRead'])->name('notifications.read');
Route::get('/notifications/read-all', [NotificationController::class, 'markAllAsRead'])->name('notifications.readAll');
