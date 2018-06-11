<?php
$namespace = 'Tams\Core\Http\Controllers';
//use \Illuminate\Routing\Route;


Route::group(['namespace' => $namespace, 'prefix' => 'tams','middleware' => ['web']], function(){
    
    Route::get('/', 'IndexController@index')->name('tams');
    
    Route::get('/school', 'SchoolController@index')->name('tams-school');
    Route::get('/school1', 'CoreController@school')->name('manage-school');
});