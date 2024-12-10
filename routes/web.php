<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\ReferralController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ServiceAgreementController;
use App\Http\Controllers\StaffMemberController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;

// Public routes
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('/contact', [ReferralController::class, 'contact'])->name('contact.submit');

Route::get('/book', function () {
    return view('book');
})->name('book');

Route::post('/book', [SessionController::class, 'book'])->name('book.submit');

Route::get('/ndis-referral', function () {
    return view('ndis-referral');
})->name('ndis.referral');

Route::post('/ndis-referral', [ReferralController::class, 'store'])->name('ndis.referral.submit');

// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Authentication routes
require __DIR__.'/auth.php';

// Protected routes
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Client management
    Route::resource('clients', ClientController::class);
    Route::get('/clients/{client}/sessions', [ClientController::class, 'sessions'])->name('clients.sessions');
    Route::get('/clients/{client}/invoices', [ClientController::class, 'invoices'])->name('clients.invoices');
    Route::get('/clients/{client}/notes', [ClientController::class, 'notes'])->name('clients.notes');
    Route::get('/clients/{client}/agreements', [ClientController::class, 'agreements'])->name('clients.agreements');

    // Session management
    Route::resource('sessions', SessionController::class);
    Route::post('/sessions/{session}/complete', [SessionController::class, 'complete'])->name('sessions.complete');
    Route::post('/sessions/{session}/cancel', [SessionController::class, 'cancel'])->name('sessions.cancel');

    // Invoice management
    Route::resource('invoices', InvoiceController::class);
    Route::post('/invoices/{invoice}/send', [InvoiceController::class, 'send'])->name('invoices.send');
    Route::post('/invoices/{invoice}/mark-paid', [InvoiceController::class, 'markPaid'])->name('invoices.mark-paid');
    Route::get('/invoices/{invoice}/download', [InvoiceController::class, 'download'])->name('invoices.download');

    // Note management
    Route::resource('notes', NoteController::class);

    // Service Agreement management
    Route::resource('agreements', ServiceAgreementController::class);
    Route::post('/agreements/{agreement}/sign', [ServiceAgreementController::class, 'sign'])->name('agreements.sign');
    Route::get('/agreements/{agreement}/download', [ServiceAgreementController::class, 'download'])->name('agreements.download');

    // Admin routes
    Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::resource('staff', StaffMemberController::class);
        Route::get('/reports', [AdminController::class, 'reports'])->name('admin.reports');
        Route::get('/settings', [AdminController::class, 'settings'])->name('admin.settings');
        Route::get('/referrals', [ReferralController::class, 'index'])->name('admin.referrals');
        Route::get('/analytics', [AdminController::class, 'analytics'])->name('admin.analytics');
        
        // Financial reports
        Route::get('/reports/revenue', [AdminController::class, 'revenue'])->name('admin.reports.revenue');
        Route::get('/reports/expenses', [AdminController::class, 'expenses'])->name('admin.reports.expenses');
        Route::get('/reports/tax', [AdminController::class, 'tax'])->name('admin.reports.tax');
        Route::get('/reports/ndis', [AdminController::class, 'ndis'])->name('admin.reports.ndis');
    });
});
