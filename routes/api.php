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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1'], function(){
	// Verify Number api/v1/verifynumber
	Route::post('verifynumber', 'VerificationController@verifyForApi');

	Route::post('customer', 'ApiController@customer');

	Route::get('categories', 'ApiController@categories');
	Route::get('cities', 'ApiController@cities');
	
	Route::get('cities/{city}/categories/{category}/shops', 'ApiController@shops');
	Route::get('shops/{shop}/products', 'ApiController@products');
});


