<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/detail', [DetailController::class, 'index'])->name('detail');

Route::controller(CheckoutController::class)->group(function () {
    Route::get('/checkout', 'index')->name('checkout');
    Route::get('/checkout/status', 'success')->name('checkout-success');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->middleware('isAdmin')
        ->name('dashboard');
});


Auth::routes(['verify' => 'true']);
