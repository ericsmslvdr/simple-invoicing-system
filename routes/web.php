<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\InvoiceLineItemController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', 'dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resources([
        'customers' => CustomerController::class,
        'invoices' => InvoiceController::class,
        'invoice-line-items' => InvoiceLineItemController::class,
        'payments' => PaymentController::class
    ]);

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware('guest')->prefix('/login')->group(function () {
    Route::get('/', [AuthController::class, 'renderLogin'])->name('login-page');
    Route::post('/', [AuthController::class, 'login'])->name('login');
});