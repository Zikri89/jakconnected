<?php

use App\Http\Controllers\DashboardBedController;
use App\Http\Controllers\KetersediaanBedController;
use Illuminate\Support\Facades\Route;

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

Route::get('/ketersediaan-bed', [KetersediaanBedController::class, 'index']);
Route::get('/dasboard-bed', [DashboardBedController::class, 'index']);
Route::post('/dasboard-bed', [DashboardBedController::class, 'status']);