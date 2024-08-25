<?php

use App\Models\Audit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\CampaignsController;
use App\Http\Controllers\CourtCaseController;
use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\CompanyController;
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


Route::controller(AuthController::class)->group(function () {
    Route::post('/logout', 'logout');
    Route::post('/login', 'attempt_login');
    Route::post('/register', 'register_user');
    Route::post('/resend-otp', 'resend_otp');
    Route::post('/verify-account', 'verify_account');
});



Route::group(['prefix' => 'v1', 'middleware' => ['auth:sanctum']], function () {

    # START OF DRBK END POINTS

});
