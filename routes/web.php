<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArmadaController;
use App\Http\Controllers\ShipmentController;
use App\Http\Controllers\BookingController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('armadas', ArmadaController::class);
Route::resource('shipments', ShipmentController::class);
Route::resource('bookings', BookingController::class);
