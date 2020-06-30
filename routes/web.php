<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return view('welcome');
});
// For import and export excel sheet
Route::get('importExportView', 'DataIOController@importExportView');
Route::post('import', 'DataIOController@import')->name('import');
Route::get('export', 'DataIOController@export')->name('export');
