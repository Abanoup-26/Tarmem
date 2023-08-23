<?php

Route::group(['prefix' => 'contractor','as' => 'contractor.', 'namespace' => 'Contractor' , 'middleware' => ['auth','contractor']], function () {
        
        Route::get('/', 'HomeController@index')->name('dashboard');
        // requests
        Route::get('request', 'RequestController@index')->name('requests');
        Route::get('building/show/{id}', 'RequestController@show')->name('building.show');
        
});
