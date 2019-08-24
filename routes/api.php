<?php

use Illuminate\Http\Request;

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

Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');

Route::group(['middleware' => 'auth:api'], function(){
  Route::post('details', 'API\UserController@details');
  Route::apiResource('countries', 'API\CountryController');
  Route::apiResource('states', 'API\StateController');
  Route::apiResource('counties', 'API\CountyController');
  Route::apiResource('regions', 'API\ProductiveRegionController');
  Route::apiResource('farms', 'API\FarmController');
  Route::apiResource('auditors', 'API\AuditorController');
  Route::apiResource('managers', 'API\TechnicalManagerController');
});
