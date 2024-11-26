<?php

use App\Http\Controllers\Admin\AdminContactsController;
use App\Http\Controllers\Admin\AdminDocumentsController;
use App\Http\Controllers\Admin\AdminDonationsController;
use App\Http\Controllers\User\ContactsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminEmailsController;
use App\Http\Controllers\Admin\VideosController;
use App\Http\Controllers\User\SentEmailController;
use App\Http\Controllers\User\DocumentsController;
use App\Http\Controllers\User\DonationsController;
use App\Http\Controllers\User\VideosController as UserVideosController;

Route::get('/', function () {
    return redirect('login');
});

Route::middleware('auth')->group(function () {
    Route::prefix('admin')->name('admin.')->middleware('admin')->group(callback: function () {
        // Admin Route
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

        Route::prefix('videos')->name('videos.')->controller(VideosController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('show/{id}', 'show')->name('show');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::put('update/{id}', 'update')->name('update');
            Route::delete('destroy/{id}', 'destroy')->name('destroy');
        });

        Route::prefix('contacts')->name('contacts.')->controller(AdminContactsController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('show/{id}', 'show')->name('show');
        });

        Route::prefix('documents')->name('documents.')->controller(AdminDocumentsController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('show/{id}', 'show')->name('show');
        });

        Route::prefix('emails')->name('emails.')->controller(AdminEmailsController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('show/{id}', 'show')->name('show');
        });

        Route::prefix('donations')->name('donations.')->controller(AdminDonationsController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('show/{id}', 'show')->name('show');
        });
    });

    Route::prefix('user')->name('user.')->middleware('user')->group(function () {
        // User Route
        Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

        Route::prefix('videos')->name('videos.')->controller(UserVideosController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('show/{id}', 'show')->name('show');
        });

        Route::prefix('contacts')->name('contacts.')->controller(ContactsController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('show/{id}', 'show')->name('show');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::put('update/{id}', 'update')->name('update');
            Route::delete('destroy/{id}', 'destroy')->name('destroy');
        });

        Route::prefix('documents')->name('documents.')->controller(DocumentsController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('show/{id}', 'show')->name('show');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::put('update/{id}', 'update')->name('update');
            Route::delete('destroy/{id}', 'destroy')->name('destroy');
        });

        Route::prefix('sent_emails')->name('sent_emails.')->controller(SentEmailController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('store', 'store')->name('store');
            Route::get('show/{id}', 'show')->name('show');
            Route::post('update', 'update')->name('update');
            Route::delete('destroy/{id}', 'destroy')->name('destroy');
        });

        Route::prefix('donations')->name('donations.')->controller(DonationsController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('show/{id}', 'show')->name('show');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::put('update/{id}', 'update')->name('update');
            Route::delete('destroy/{id}', 'destroy')->name('destroy');
        });
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
