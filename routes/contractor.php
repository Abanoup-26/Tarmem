<?php

Route::group(['prefix' => 'contractor','as' => 'contractor.', 'namespace' => 'Contractor' , 'middleware' => ['auth','contractor']], function () {
        
        Route::get('/', 'HomeController@index')->name('dashboard');
        // requests
        Route::get('request', 'RequestController@index')->name('requests');
        // building
        Route::get('building/show', 'BuildingController@show')->name('building.show');
        
});
