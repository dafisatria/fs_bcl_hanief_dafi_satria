<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArmadaController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('armadas', ArmadaController::class);
