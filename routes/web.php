<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AirwayBillController;
use App\Http\Controllers\TrackingStatusController;

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
    return view('tracking.tracking');
})->name('home');

Route::post('/tracking', [TrackingStatusController::class, 'track'])->name('tracking');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
	Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

	Route::resource('customers', CustomerController::class)->names('customers');
	Route::get('customers/{id}/delete', [CustomerController::class, 'delete'])->name('customers.delete');

	Route::resource('airway_bills', AirwayBillController::class)->names('airway_bills');
	Route::get('airway_bills/{id}/delete', [AirwayBillController::class, 'delete'])->name('airway_bills.delete');

	Route::resource('tracking_statuses', TrackingStatusController::class)->except(['index', 'create', 'show'])->names('tracking_statuses');
	Route::get('tracking_statuses/{airway_bill_id}/create', [TrackingStatusController::class, 'create'])->name('tracking_statuses.create');
	Route::get('tracking_statuses/{id}/delete', [TrackingStatusController::class, 'delete'])->name('tracking_statuses.delete');
});
