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

Route::get('/testing', 'App\Http\Controllers\TestingController@index');
Route::get('/predictionForm', function () {
    return view('forms/prediction_form');
});

Route::post('/import', 'App\Http\Controllers\TestingController@excelUpload')->name('import');
Route::get('/predictAll', 'App\Http\Controllers\TestingController@predictAll')->name('predictAll');
Route::post('/predictNew', 'App\Http\Controllers\NewTestingDataController@predictNewData')->name('predict_new');
