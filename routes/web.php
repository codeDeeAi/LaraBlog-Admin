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

// Routes for  Login
Route::post('app/admin_login', 'UserController@adminLogin');

// Routes for  Tags
Route::post('app/create_tag', 'AdminController@addTag');
Route::get('app/get_tags', 'AdminController@getTag');
Route::post('app/edit_tag', 'AdminController@editTag');
Route::post('app/delete_tag', 'AdminController@deleteTag');

// Routes for categories
Route::post('app/upload_category', 'CategoryController@upload');
Route::get('app/get_category', 'CategoryController@viewCategories');
Route::post('app/edit_category', 'CategoryController@editCategory');
Route::post('app/delete_category', 'CategoryController@deleteCategory');

// Routes for users
Route::post('app/create_user', 'UserController@create');
Route::get('app/get_users', 'UserController@viewUsers');
Route::post('app/edit_users', 'UserController@editUsers');
Route::post('app/delete_user', 'UserController@deleteUser');

Route::get('/', function () {
    return view('welcome');
});
// Pizzas Route
Route::get('/pizzas', 'PizzaController@index');
// If route not found, return welcome page
Route::any('{slug}', function () {
    return view('welcome');
});
// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
