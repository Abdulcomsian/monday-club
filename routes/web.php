<?php

use App\Http\Controllers\Admin\AdminContactsController;
use App\Http\Controllers\Admin\AdminDocumentsController;
use App\Http\Controllers\User\ContactsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\VideosController;
use App\Http\Controllers\User\DocumentsController;
use App\Http\Controllers\User\EmailsController;
use App\Http\Controllers\User\VideosController as UserVideosController;

Route::get('/', function () {
    return redirect('login');
});

Route::middleware('auth')->group(function () {
    Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {
        // Admin Route
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

        Route::prefix('videos')->name('videos.')->controller(VideosController::class)->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::get('show', 'show')->name('show');
            Route::get('edit', 'edit')->name('edit');
        });

        Route::prefix('contacts')->name('contacts.')->controller(AdminContactsController::class)->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('show', 'show')->name('show');
        });

        Route::prefix('documents')->name('documents.')->controller(AdminDocumentsController::class)->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('show', 'show')->name('show');
        });
    });

    Route::prefix('user')->name('user.')->middleware('user')->group(function () {
        // User Route
        Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

        Route::prefix('videos')->name('videos.')->controller(UserVideosController::class)->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('show', 'show')->name('show');
        });

        Route::prefix('contacts')->name('contacts.')->controller(ContactsController::class)->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::get('show', 'show')->name('show');
            Route::get('edit', 'edit')->name('edit');
        });

        Route::prefix('documents')->name('documents.')->controller(DocumentsController::class)->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::get('show', 'show')->name('show');
            Route::get('edit', 'edit')->name('edit');
        });

        Route::prefix('emails')->name('emails.')->controller(EmailsController::class)->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('show', 'show')->name('show');
        });
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
