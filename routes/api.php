<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Partner;

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

Route::apiResource('partners', 'PartnerController');
Route::apiResource('delivery-times', 'DeliveryTimeController');
Route::apiResource('cities', 'CityController');
Route::apiResource('days-off', 'DaysOffController');
Route::post('cities/{id}/delivery-times', 'CityController@attach');
Route::get('cities/{id}/delivery-dates-times/{number_of_days}', 'CityController@deliveries');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
