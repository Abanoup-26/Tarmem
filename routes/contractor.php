<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'contractor','as' => 'contractor.', 'namespace' => 'Contractor' , 'middleware' => ['auth','contractor']], function () {
        
        Route::get('/', 'HomeController@index')->name('dashboard');
        // requests
        Route::get('request', 'RequestController@index')->name('requests');
        Route::get('building/show/{id}', 'RequestController@show')->name('building.show');
        Route::get('building/edit/{id}', 'RequestController@edit')->name('building.edit');
        Route::post('building/update', 'RequestController@update')->name('building.update');
        Route::post('building-contractors/media', 'RequestController@storeMedia')->name('building-contractors.storeMedia');
    Route::post('building-contractors/ckmedia', 'RequestController@storeCKEditorImages')->name('building-contractors.storeCKEditorImages');
        
});
