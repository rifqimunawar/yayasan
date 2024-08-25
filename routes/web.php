<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

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

Route::get('/', function () {
  return redirect()->route('login');
});


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('authenticate');
Route::get('/register', [LoginController::class, 'showRegistrationForm'])->name('register');
Route::post('/register/store', [LoginController::class, 'register'])->name('register.store');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
