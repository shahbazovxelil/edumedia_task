<?php
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\DataTableController;
use App\Http\Controllers\Backend\UserController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->name('backend.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('login', [AuthController::class, 'loginView'])->name('login.view');
        Route::post('login', [AuthController::class, 'login'])->name('login');
        Route::post('/register', [AuthController::class, 'register'])->name('register');
        Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('showRegistrationForm');
    });

    Route::middleware('auth')->group(function () {
        Route::get('', DashboardController::class)->name('dashboard');
        Route::get('logout', [AuthController::class, 'logout'])->name('logout');

        Route::resource('users', UserController::class)->middleware('admin')->except('index');
        Route::get('users', [UserController::class, 'index'])->name('users.index');

        Route::prefix('fetch')->name('fetch.')->controller(DataTableController::class)->group(function () {
            Route::get('users', 'fetchUsers')->name('users');
        });
    });
});




