<?php


Route::group(['prefix' => 'organization','as' => 'organization.', 'namespace' => 'Organization' ,'middleware' =>['auth','organization']], function () {
        Route::get('/', 'HomeController@index')->name('dashboard');
        // beneficiaries
        Route::get('beneficiaries', 'BeneficiaryController@index')->name('beneficiary.index');
        Route::get('beneficiaries/show', 'BeneficiaryController@show')->name('beneficiary.show');
        Route::get('add-beneficiary', 'BeneficiaryController@create')->name('beneficiary.create');
        // building
        Route::get('building', 'BuildingController@index')->name('building.index');
        Route::get('add-building', 'BuildingController@create')->name('building.create');
        Route::get('show-building/{id}', 'BuildingController@show')->name('building.show');
        Route::post('store-building' , 'BuildingController@store')->name('building.store');
        Route::post('buildings/media', 'BuildingController@storeMedia')->name('buildings.storeMedia');
        Route::post('buildings/ckmedia', 'BuildingController@storeCKEditorImages')->name('buildings.storeCKEditorImages');
        Route::get('buildings/send/{id}', 'BuildingController@send')->name('building.send');
});
