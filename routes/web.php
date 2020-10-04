<?php

use App\Http\Controllers\NewController;
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

// Routes for get tag
Route::post('app/create_tag', 'AdminController@addTag');
Route::get('app/get_tags', 'AdminController@getTag');
Route::post('app/edit_tag', 'AdminController@editTag');
Route::post('app/delete_tag', 'AdminController@deleteTag');

// Routes for categories
Route::post('app/upload_category', 'CategoryController@upload');
Route::get('app/get_category', 'CategoryController@viewCategories');
Route::post('app/edit_category', 'CategoryController@editCategory');
Route::post('app/delete_category', 'CategoryController@deleteCategory');

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