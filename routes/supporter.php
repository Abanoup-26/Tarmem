<?php

Route::group(['prefix' => 'supporter','as' => 'supporter.', 'namespace' => 'Supporter' , 'middleware' => ['auth','supporter']], function () {
        
        Route::get('/', 'HomeController@index')->name('dashboard');
        // requests
        Route::get('request', 'RequestController@index')->name('requests');
        Route::get('building/show/{id}', 'RequestController@show')->name('building.show');
});