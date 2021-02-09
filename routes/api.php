<?php

use App\Http\Controllers\Api\GrabbingController;
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
Route::get('/province', [GrabbingController::class, 'getProvince']);
Route::get('/city', [GrabbingController::class, 'getCity']);
Route::get('/subdistrict', [GrabbingController::class, 'getSubdistrict']);

Route::get('/cost/city', [GrabbingController::class, 'getCostByCity']);
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
