<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Welcome route
Route::get('/', [BookController::class, 'welcome'])->name('welcome');

// Simple routes for library
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Compatibility route: old petugas dashboard now points to admin panel
Route::middleware(['auth', 'petugas'])->prefix('petugas')->name('petugas.')->group(function () {
    Route::get('dashboard', function () {
        return redirect()->route('admin.dashboard');
    })->name('dashboard');
});

// Authentication routes
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.post');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register'])->name('register.post');

Route::resource('books', BookController::class)->only(['index', 'show']);
Route::resource('categories', CategoryController::class)->only(['index', 'show']);

Route::middleware('auth')->post('books/{book}/rating', [BookController::class, 'storeRating'])->name('books.rating');

// Admin-only public book CRUD
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('books/create', [BookController::class, 'create'])->name('books.create');
    Route::post('books', [BookController::class, 'store'])->name('books.store');
    Route::get('books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
    Route::put('books/{book}', [BookController::class, 'update'])->name('books.update');
    Route::delete('books/{book}', [BookController::class, 'destroy'])->name('books.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('loans', [LoanController::class, 'index'])->name('loans.index');
    Route::post('loans', [LoanController::class, 'store'])->name('loans.store');
    Route::post('loans/{loan}/approve', [LoanController::class, 'approve'])->name('loans.approve');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('loans/{loan}/return', [LoanController::class, 'return'])->name('loans.return');
    Route::get('history-peminjaman', [LoanController::class, 'userHistory'])->name('loans.history');
    Route::get('loans/{loan}/ticket', [LoanController::class, 'ticket'])->name('loans.ticket');
    Route::get('favorit', [FavoriteController::class, 'index'])->name('favorites.index');
    Route::post('books/{book}/favorite', [FavoriteController::class, 'toggle'])->name('books.favorite');

    // User notifications
    Route::get('notifications', [LoanController::class, 'notificationsIndex'])->name('notifications.index');
    Route::post('notifications/{notification}/read', [LoanController::class, 'notificationsMarkRead'])->name('notifications.read');
    Route::post('notifications/read-all', [LoanController::class, 'notificationsMarkAllRead'])->name('notifications.read-all');
});

// Admin panel read-only routes for admin + petugas
Route::middleware(['auth', 'admin_or_petugas'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');

    // Read pages
    Route::get('users', [AdminController::class, 'usersIndex'])->name('users.index');
    Route::get('books', [AdminController::class, 'booksIndex'])->name('books.index');
    Route::get('categories', [AdminController::class, 'categoriesIndex'])->name('categories.index');
    Route::get('loans', [AdminController::class, 'loansIndex'])->name('loans.index');
    Route::get('loans/{loan}', [AdminController::class, 'loansShow'])->name('loans.show');
    Route::get('notifications', [AdminController::class, 'notificationsIndex'])->name('notifications');
    Route::get('notifications/{notification}', [AdminController::class, 'notificationsShow'])->name('notifications.show');

    // Write actions: admin only (petugas cannot CRUD)
    Route::middleware('admin')->group(function () {
        // Reports
        Route::get('reports', [AdminController::class, 'reportsIndex'])->name('reports.index');

        // Staff (Petugas)
        Route::get('staff', [AdminController::class, 'staffIndex'])->name('staff.index');
        Route::get('staff/create', [AdminController::class, 'staffCreate'])->name('staff.create');
        Route::post('staff', [AdminController::class, 'staffStore'])->name('staff.store');
        Route::get('staff/{staff}/edit', [AdminController::class, 'staffEdit'])->name('staff.edit');
        Route::put('staff/{staff}', [AdminController::class, 'staffUpdate'])->name('staff.update');
        Route::delete('staff/{staff}', [AdminController::class, 'staffDestroy'])->name('staff.destroy');

        // Books
        Route::get('books/create', [AdminController::class, 'booksCreate'])->name('books.create');
        Route::post('books', [AdminController::class, 'booksStore'])->name('books.store');
        Route::get('books/{book}/edit', [AdminController::class, 'booksEdit'])->name('books.edit');
        Route::put('books/{book}', [AdminController::class, 'booksUpdate'])->name('books.update');
        Route::delete('books/{book}', [AdminController::class, 'booksDestroy'])->name('books.destroy');

        // Categories
        Route::get('categories/create', [AdminController::class, 'categoriesCreate'])->name('categories.create');
        Route::post('categories', [AdminController::class, 'categoriesStore'])->name('categories.store');
        Route::get('categories/{category}/edit', [AdminController::class, 'categoriesEdit'])->name('categories.edit');
        Route::put('categories/{category}', [AdminController::class, 'categoriesUpdate'])->name('categories.update');
        Route::delete('categories/{category}', [AdminController::class, 'categoriesDestroy'])->name('categories.destroy');

        // Loans
        Route::post('loans/{loan}/approve', [AdminController::class, 'loansApprove'])->name('loans.approve');
        Route::post('loans/{loan}/reject', [AdminController::class, 'loansReject'])->name('loans.reject');
        Route::post('loans/{loan}/return', [AdminController::class, 'loansReturn'])->name('loans.return');

        // Notifications
        Route::post('notifications/{notification}/mark-read', [AdminController::class, 'notificationsMarkAsRead'])->name('notifications.mark-read');
        Route::delete('notifications/{notification}', [AdminController::class, 'notificationsDelete'])->name('notifications.delete');
        Route::post('notifications/clear', [AdminController::class, 'notificationsClearAll'])->name('notifications.clear');
    });
});
