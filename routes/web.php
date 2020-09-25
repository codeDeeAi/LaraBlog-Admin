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
// Pizzas Route
Route::get('/pizzas', 'PizzaController@index');
// New route
Route::get('/new', 'NewController@index');
// If route not found, return welcome page
Route::any('{slug}', function () {
    return view('welcome');
});