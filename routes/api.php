<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\TransactionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::prefix('v3')->group(function () {
    Route::post('/merchant/user/login/', [LoginController::class, 'index']);
    
    Route::middleware(['auth:sanctum'])->group(function () {
        Route::post('/transactions/report', [TransactionController::class, 'report']);
        Route::post('/transaction/list', [TransactionController::class, 'list']);
        Route::get('/transaction/list/{page_number}', [TransactionController::class, 'show']);
        Route::post('/transaction', [TransactionController::class, 'index']);
        Route::post('/client', [CustomerController::class, 'index']);
    });
});

