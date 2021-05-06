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
    return view('layouts.welcome');
});

Route::get('/search', 'MainController@getSearchPage')->name('search');
Route::get('/results', 'MainController@getSearchPage')->name('results');
Route::post('/price', 'MainController@getPrice')->name('get-price');