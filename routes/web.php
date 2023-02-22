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

Route::get('', ['as' => 'home', 'uses' => 'App\Http\Controllers\Controller@home']);
Route::get('rate', ['as' => 'avg', 'uses' => 'App\Http\Controllers\RateController@avg']);
Route::post('rate', ['as' => 'rate', 'uses' => 'App\Http\Controllers\RateController@rate']);
