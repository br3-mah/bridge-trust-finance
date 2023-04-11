<?php

use App\Http\Controllers\Api\LoanRequestController;
use App\Http\Controllers\Api\UserAuthenticationController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\LoanApplicationController;
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
Route::post('update-profile', [UserController::class, 'updateProfile']);
Route::post('change-password', [UserController::class, 'updatePassword']);
Route::post('upload-files', [UserController::class, 'uploadFiles']);


// Functions
Route::post('apply-for-loan', [LoanApplicationController::class, 'new_loan']);
Route::get('get-my-loans/{id}', [LoanRequestController::class, 'getMyLoans']);

Route::get('get-my-loan-balance/{loan_id}', [LoanRequestController::class, 'loanBalance']);
Route::get('get-my-balance/{user_id}', [LoanRequestController::class, 'customerBalance']);

Route::get('get-loan-interest-rate/{duration}/{principal}', [LoanRequestController::class, 'interestRate']);
Route::get('get-loan-interest-amount/{duration}/{principal}', [LoanRequestController::class, 'interestAmount']);
Route::get('get-loan-monthly-installment-amount/{duration}/{principal}', [LoanRequestController::class, 'loanMonthlyInstallments']);
Route::get('get-total-payback-amount/{duration}/{principal}', [LoanRequestController::class, 'totalCollectable']);

// Deprected
Route::get('get-my-wallet/{id}', [LoanRequestController::class, 'getWallets']);
Route::get('get-my-withdrawal-requests/{id}', [LoanRequestController::class, 'getWithdrawalRequests']);
Route::post('make-withdrawal-request', [LoanRequestController::class, 'makeWithdrawalRequest']);