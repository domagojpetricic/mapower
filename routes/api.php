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

Route::get('/outages', 'OutagesController@getAll')->name('outages');

Route::get('/allreports', 'ReportController@allReports')->name('allreports');

//Route::get('/vuereports', 'ReportController@reportsReady')->name('vuereports');

Route::get('/vuereports', 'OperatorController@reportsReady')->name('vuereports');

Route::get('/op1reports', 'ReportController@operator1reports')->name('op1reports');

Route::get('/geojson', 'OperatorController@geoJson')->name('geojson')->middleware('cors');

Route::get('/geojson1', 'ReportController@geoJson')->name('geojsonreports')->middleware('cors');
