<?php

use App\Http\Controllers\Api\LoanRequestController;
use App\Http\Controllers\API\UserAuthenticationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('apply-loan', LoanRequestController::class);
Route::post('register', [UserAuthenticationController::class, 'register']);
Route::post('login', [UserAuthenticationController::class, 'login']);

Route::get('get-my-loans/{id}', [LoanRequestController::class, 'getMyLoans']);
Route::get('get-my-wallet/{id}', [LoanRequestController::class, 'getWallets']);
Route::get('get-my-withdrawal-requests/{id}', [LoanRequestController::class, 'getWithdrawalRequests']);
Route::post('make-withdrawal-request', [LoanRequestController::class, 'makeWithdrawalRequest']);
