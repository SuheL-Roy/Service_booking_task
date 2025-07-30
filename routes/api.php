<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SurveyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


Route::middleware('auth:sanctum')->group(function () {
  
    //Logout route
    Route::post('/logout', [AuthController::class, 'logout']);

    // Customer routes
     Route::middleware('role:customer') ->prefix('customer')->group(function () {
        Route::get('/services', [ServiceController::class, 'list_services']);
        Route::post('/store-bookings', [BookingController::class, 'store_booking']);
        Route::get('/user-bookings', [BookingController::class, 'user_bookings']);
    });

    // Admin routes
    Route::middleware('role:admin')->prefix('admin')->group(function () {
        Route::post('/store-services', [ServiceController::class, 'store_service']);
        Route::put('/update-services/{id}', [ServiceController::class, 'update_service']);
        Route::delete('/destroy-services/{id}', [ServiceController::class, 'destroy_service']);
        Route::get('/all-bookings', [BookingController::class, 'allBookings']);
    });
  
});


