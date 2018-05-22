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
//User management route
Route::get('/users', 'Core\UsersController@users')->name('user-management');
Route::get('/manage/profile/{id}', 'Core\UsersController@profile')->name('manage-profile');
Route::get('/manage/user/create', 'Core\UsersController@create_user')->name('create_user');

//Authenticated user 
Route::get('/profile', 'Core\AuthUserController@index')->name('user-profile');
Route::get('/settings', 'Core\AuthUserController@edit')->name('profile-setting');

Route::post('/update_next_of_kin', 'Core\AuthUserController@update_next_of_kin')->name('update-next-of-kin');
Route::post('/update_profile', 'Core\AuthUserController@update_profile')->name('update-profile');
Route::post('/upload_image', 'Core\AuthUserController@upload_image')->name('upload-image');
Route::post('/update_password', 'Core\AuthUserController@update_password')->name('update-password');

