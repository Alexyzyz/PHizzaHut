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

// for guests
Route::get('/', 'PageController@login')->middleware('guest');
Route::get('/register', 'PageController@register')->middleware('guest');

Auth::routes();

// for members
Route::get('/transactions', 'PageController@transactions')->middleware('role:member');

Route::get('/cart', 'PageController@cart')->middleware('role:member');
Route::post('/cart', 'CartItemController@update_cart_item')->middleware('role:member');

Route::delete('/cart/delete/all', 'CartItemController@delete_all_cart_items')->middleware('role:member');

Route::patch('/cart/update/{id}', 'CartItemController@update_cart_item')->middleware('role:member');
Route::delete('/cart/delete/{id}', 'CartItemController@delete_cart_item')->middleware('role:member');

Route::post('/pizza/{id}/add', 'CartItemController@insert_cart_item')->middleware('role:member');

// for admins
Route::get('/transactions/all', 'PageController@all_transactions')->middleware('role:admin');

Route::get('/users', 'PageController@users')->middleware('role:admin');

Route::get('/pizza/add', 'PageController@add_pizza')->middleware('role:admin');
Route::post('/pizza/add', 'PizzaController@insert_pizza')->middleware('role:admin');

Route::get('/pizza/{id}/edit', 'PageController@edit_pizza')->middleware('role:admin');
Route::patch('/pizza/{id}/edit', 'PizzaController@update_pizza')->middleware('role:admin');

Route::get('/pizza/{id}/delete', 'PageController@delete_pizza')->middleware('role:admin');
Route::delete('/pizza/{id}/delete', 'PizzaController@delete_pizza')->middleware('role:admin');

// for members and admins
Route::get('/home', 'PageController@home');
Route::post('/home', 'HomeController@search');

Route::get('/pizza/{id}', 'PageController@pizza_detail')->middleware('role:admin,member');

Route::get('/transactions/{id}', 'PageController@transaction_detail')->middleware('role:admin,member');