<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// authentication
Route::middleware('guest')->group(function () {
  Route::get('/auth/login', [AuthController::class, 'loginView'])->name('login');
  Route::post('/auth/login', [AuthController::class, 'login']);
  Route::get('/auth/register', [AuthController::class, 'registerView'])->name('register');
  Route::post('/auth/register', [AuthController::class, 'register']);
});


// Route::get('/auth/register-basic', $controller_path . '\authentications\RegisterBasic@index')->name('auth-register-basic');
Route::middleware('auth')->group(function () {
  // Auth Logout
  Route::post('/auth/logout', [AuthController::class, 'logout'])->name('logout');

  // Main Page Route
  $controller_path = 'App\Http\Controllers';
  Route::get('/', $controller_path . '\pages\HomePage@index')->name('home');
  Route::get('/page-2', $controller_path . '\pages\Page2@index')->name('pages-page-2');

  // pages
  Route::get('/pages/misc-error', $controller_path . '\pages\MiscError@index')->name('pages-misc-error');
});

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
  $request->fulfill();

  return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');
