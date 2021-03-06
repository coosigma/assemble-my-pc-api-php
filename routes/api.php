<?php

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

// Route::get('all-components', 'ComponentController@index');
Route::get('components/{category}', 'ComponentController@searchByCategory');
Route::get('component/{id}', 'ComponentController@searchById');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
