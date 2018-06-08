<?php
$namespace = 'Tams\Core\Http\Controllers';
//use \Illuminate\Routing\Route;


Route::group(['namespace' => $namespace, 'prefix' => 'tams','middleware' => ['web']], function(){
    
    Route::get('/', 'CoreController@index')->name('tams');
    
    Route::get('/test', 'CoreController@test');
    Route::get('/school', 'CoreController@school')->name('manage-school');
});