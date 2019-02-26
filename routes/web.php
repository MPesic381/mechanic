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

Route::get('/', 'PageController@index')->name('home');

Route::get('/register', 'Auth\RegisterController@showRegistrationForm');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::resource('cars', 'CarController');
Route::resource('services', 'ServiceController')->except(['show']);
Route::resource('bookings', 'BookingController')->except(['edit', 'update']);

Route::get('/api/services', 'Api\ServiceController@index');
Route::get('/api/users', 'Api\UserController@index');
Route::get('/api/cars', 'Api\CarController@index');

Route::post('/api/booking', 'Api\BookingController@store');