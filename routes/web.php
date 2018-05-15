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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users', 'Core\UsersController@index')->name('user-management');
Route::get('/profile', 'Core\UsersController@profile')->name('user-profile');
Route::get('/profile/settings', 'Core\UsersController@profile_settings')->name('profile-setting');
Route::post('/profile/update_next_of_kin', 'Core\UsersController@update_next_of_kin')->name('update_next_of_kin');
Route::post('/profile/update_profile', 'Core\UsersController@update_profile')->name('update_profile');
