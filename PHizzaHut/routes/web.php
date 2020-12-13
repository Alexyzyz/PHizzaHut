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

Route::get('/', 'PageController@login')->middleware('guest');
Route::get('/register', 'PageController@register')->middleware('guest');

Auth::routes();

Route::get('/home', 'PageController@home');
Route::post('/home', 'PageController@search_home');

Route::get('/pizza-detail/{id}', 'PageController@pizza_detail');

Route::get('/users', 'PageController@users');
Route::get('/all-transactions', 'PageController@all_transactions');