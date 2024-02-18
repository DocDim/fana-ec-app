<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' =>'v1', 'namespace' => 'App\Http\Controllers\Api\V1'], function() {
    Route::apiResource('members', MemberController::class);
    Route::apiResource('payments', PaymentController::class);
    Route::apiResource('charges', ChargeController::class);

    Route::post('charges/bulk', ['uses'=> 'ChargeController@bulkStore']);
    Route::post('payments/bulk', ['uses'=> 'PaymentController@bulkStore']);
});
