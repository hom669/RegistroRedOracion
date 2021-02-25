<?php

use Illuminate\Support\Facades\Route;
use GuzzleHttp\Client;
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


    //dd($response);

    return view('auth.login');
});

Route::resource('monitor','App\Http\Controllers\MonitorController');
Route::post('monitor/store', 'App\Http\Controllers\MonitorController@store');
Route::get('monitor/edit/{id}', 'App\Http\Controllers\MonitorController@edit');
Route::get('monitor/confirmdestroy/{id}', 'App\Http\Controllers\MonitorController@confirmdestroy');
Route::get('monitor/destroy/{id}', 'App\Http\Controllers\MonitorController@destroy');
Route::post('monitor/update/{id}', 'App\Http\Controllers\MonitorController@update');
Route::get('monitor/update/{id}', 'App\Http\Controllers\MonitorController@update');

Route::resource('registerOld','App\Http\Controllers\RegisterOldController');
Route::post('registerOld/store', 'App\Http\Controllers\RegisterOldController@store');
Route::get('registerOld/edit/{id}', 'App\Http\Controllers\RegisterOldController@edit');
Route::get('registerOld/confirmdestroy/{id}', 'App\Http\Controllers\RegisterOldController@confirmdestroy');
Route::get('registerOld/destroy/{id}', 'App\Http\Controllers\RegisterOldController@destroy');
Route::post('registerOld/update/{id}', 'App\Http\Controllers\RegisterOldController@update');
Route::get('registerOld/update/{id}', 'App\Http\Controllers\RegisterOldController@update');

Route::resource('requests','App\Http\Controllers\RequestController');
Route::post('requests/store', 'App\Http\Controllers\RequestController@store');
Route::get('requests/edit/{id}', 'App\Http\Controllers\RequestController@edit');
Route::get('requests/confirmdestroy/{id}', 'App\Http\Controllers\RequestController@confirmdestroy');
Route::get('requests/destroy/{id}', 'App\Http\Controllers\RequestController@destroy');
Route::post('requests/update/{id}', 'App\Http\Controllers\RequestController@update');
Route::get('requests/update/{id}', 'App\Http\Controllers\RequestController@update');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

