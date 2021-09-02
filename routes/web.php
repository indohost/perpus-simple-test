<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\RackController;
use App\Http\Controllers\Admin\RegistrationBookController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\WriterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes(['register' => false]);

// Forget Password
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

Route::middleware(['auth'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::middleware(['admin'])->prefix('admin')->group(function () {
        Route::get('/', [AdminController::class, 'index']);

        // User
        Route::prefix('user')->group(function () {
            Route::get('/', [AdminUserController::class, 'index']);
            Route::get('/create', [AdminUserController::class, 'create']);
            Route::post('/store', [AdminUserController::class, 'store']);
            Route::get('/edit/{id}', [AdminUserController::class, 'edit']);
            Route::post('/update/{id}', [AdminUserController::class, 'update']);
            Route::get('/delete/{id}', [AdminUserController::class, 'destroy']);
        });

        // Author
        Route::prefix('author')->group(function () {
            Route::get('/', [AuthorController::class, 'index']);
            Route::get('/create', [AuthorController::class, 'create']);
            Route::post('/store', [AuthorController::class, 'store']);
            Route::get('/edit/{id}', [AuthorController::class, 'edit']);
            Route::post('/update/{id}', [AuthorController::class, 'update']);
            Route::get('/delete/{id}', [AuthorController::class, 'destroy']);
        });

        // Writer
        Route::prefix('writer')->group(function () {
            Route::get('/', [WriterController::class, 'index']);
            Route::get('/create', [WriterController::class, 'create']);
            Route::post('/store', [WriterController::class, 'store']);
            Route::get('/edit/{id}', [WriterController::class, 'edit']);
            Route::post('/update/{id}', [WriterController::class, 'update']);
            Route::get('/delete/{id}', [WriterController::class, 'destroy']);
        });

        // Rack
        Route::prefix('rack')->group(function () {
            Route::get('/', [RackController::class, 'index']);
            Route::get('/create', [RackController::class, 'create']);
            Route::post('/store', [RackController::class, 'store']);
            Route::get('/edit/{id}', [RackController::class, 'edit']);
            Route::post('/update/{id}', [RackController::class, 'update']);
            Route::get('/delete/{id}', [RackController::class, 'destroy']);
        });

        // Book
        Route::prefix('book')->group(function () {
            Route::get('/', [BookController::class, 'index']);
            Route::get('/create', [BookController::class, 'create']);
            Route::post('/store', [BookController::class, 'store']);
            Route::get('/edit/{id}', [BookController::class, 'edit']);
            Route::post('/update/{id}', [BookController::class, 'update']);
            Route::get('/delete/{id}', [BookController::class, 'destroy']);
        });

        // Registration Book
        Route::prefix('regBook')->group(function () {
            Route::get('/', [RegistrationBookController::class, 'index']);
            Route::get('/create', [RegistrationBookController::class, 'create']);
            Route::post('/store', [RegistrationBookController::class, 'store']);
            Route::get('/edit/{id}', [RegistrationBookController::class, 'edit']);
            Route::post('/update/{id}', [RegistrationBookController::class, 'update']);
            Route::get('/delete/{id}', [RegistrationBookController::class, 'destroy']);
        });
    });

    Route::middleware(['user'])->prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'index']);

        // Book
        Route::prefix('book')->group(function () {
            Route::get('/', [UserController::class, 'books']);
        });
    });

    Route::get('/logout', function () {
        Auth::logout();
        redirect('/');
    });
});
