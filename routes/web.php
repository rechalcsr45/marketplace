<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\ProductController;


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
    return view('welcome');
});
Route::GET('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register-user', [AuthController::class, 'register'])->name('register-user');
Route::get('/login',[AuthController::class,'showLoginForm'])->name('login');
Route::post('/login-user',[AuthController::class,'login'])->name('login-user');
Route::post('/logout', [HomeController::class, 'logout'])->name('logout');
Route::post('/profile', [HomeController::class, 'profile'])->name('profile');

Route::resource('home', HomeController::class)->middleware('auth');
Route::resource('product',ProductController::class);

