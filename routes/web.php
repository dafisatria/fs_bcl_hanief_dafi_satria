<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArmadaController;
use App\Http\Controllers\ShipmentController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ReportController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('armadas', ArmadaController::class);
Route::resource('shipments', ShipmentController::class);
Route::resource('bookings', BookingController::class);

Route::get('reports/shipments', [ReportController::class, 'shipments'])->name('reports.shipments');

