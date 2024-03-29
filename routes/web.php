<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\TravelPackageController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/detail/{slug}', [DetailController::class, 'index'])->name('detail');

Route::controller(CheckoutController::class)->group(function () {
    Route::post('/checkout/{uuid}', [CheckoutController::class, 'process'])
        ->name('checkout-process')
        ->middleware(['auth', 'verified']);
    Route::get('/checkout/{uuid}', [CheckoutController::class, 'index'])
        ->name('checkout')
        ->middleware(['auth', 'verified']);
    Route::get('/checkout/remove/{detail_uuid}', [CheckoutController::class, 'remove'])
        ->name('checkout-remove')
        ->middleware(['auth', 'verified']);
    Route::post('/checkout/create/{detail_uuid}', [CheckoutController::class, 'create'])
        ->name('checkout-create')
        ->middleware(['auth', 'verified']);
    Route::get('/checkout/confirm/{uuid}', [CheckoutController::class, 'success'])
        ->name('checkout-success')
        ->middleware(['auth', 'verified']);
});

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');
});

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'isAdmin']], static function () {
    Route::resource('travel-package', TravelPackageController::class);
    Route::resource('gallery', GalleryController::class);
    Route::resource('transaction', TransactionController::class);
});
Route::post('/transaction/success', [TransactionController::class, 'handleTransactionSuccess'])->name('transaction.success');

Auth::routes(['verify' => 'true']);
