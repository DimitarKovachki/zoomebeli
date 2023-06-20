<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

// Route::get('/register', function () {
//     abort(404);
// });

// Route::post('/register', function () {
//     abort(404);
// });

Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest');


Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');


Route::get('/forgot-password', function () {
    abort(404);
});

Route::post('/forgot-password', function () {
    abort(404);
});

Route::get('/reset-password/{token}', function () {
    abort(404);
});

Route::post('/reset-password', function () {
    abort(404);
});

Route::get('/verify-email', function () {
    abort(404);
});

Route::get('/verify-email/{id}/{hash}', function () {
    abort(404);
});

Route::post('/email/verification-notification', function () {
    abort(404);
});

Route::get('/confirm-password', function () {
    abort(404);
});

Route::post('/confirm-password', function () {
    abort(404);
});
