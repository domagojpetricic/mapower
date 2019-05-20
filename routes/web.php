<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/map', function() {
	return view('map');
})->name('map');

Route::get('/secondmap', function() {
	return view('secondmap');
})->name('secondmap');

Route::get('/thirdmap', function() {
	return view('thirdmap');
})->name('thirdmap');


Route::get('/reports','ReportController@index')->name('allreports');
 
Route::get('/report/create','ReportController@create')->name('create.report');
 
Route::post('/reportaction','ReportController@storeReport')->name('report.action');

Route::get('/superadmin', function(){
	return 'super admin account';
})->middleware(['auth', 'auth.superadmin']);

Route::get('/operatoradmin', function(){
	return 'operator admin account';
})->middleware(['auth', 'auth.operatoradmin']);



Route::namespace('SuperAdmin')->prefix('superadmin')->middleware(['auth', 'auth.superadmin'])->name('superadmin.')->group(function(){
	Route::resource('/users', 'UserController', ['except' => ['show', 'create', 'store']]);
});

Route::get('/vuereports1', 'OperatorController@reportsReady')->name('vuereports1');

