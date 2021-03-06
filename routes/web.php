<?php

use App\Http\Controllers\ArchivesController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CarColorController;
use App\Models\Archives;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::resource('/', IndexController::class)->only('index');
    Route::resource('/home', HomeController::class)->only('index');
    Route::resource('/archives', ArchivesController::class);
    Route::resource('/transactions', TransactionController::class);
    Route::get('/transfer', [TransactionController::class, 'transferArchives'])->name('transactions.transfer.archives');
    Route::resource('/cars', CarController::class);
    Route::resource('/users', UserController::class);
    Route::resource('/car-colors', CarColorController::class);
});
