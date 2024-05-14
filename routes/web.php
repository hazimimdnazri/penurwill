<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\AdminController;

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

Route::get('/', [GuestController::class, 'index']);
Route::get('contact-us', [GuestController::class, 'contactUs']);
Route::get('logout', [GuestController::class, 'submitLogout'])->name('logout')->middleware('auth');

Route::group(['middleware' => ['guest'], 'prefix' => 'guest'], function(){
    Route::get('login', [GuestController::class, 'login'])->name('login');
    Route::post('login', [GuestController::class, 'submitLogin']);
});

Route::group(['middleware' => ['auth', 'role: 3, 4'], 'prefix' => 'admin'], function(){
    Route::get('dashboard', [AdminController::class, 'dashboard']);
    Route::get('calendar', [AdminController::class, 'calendar']);
});
