<?php


Route::group(['prefix' => 'organization','as' => 'organization.', 'namespace' => 'Organization' ,'middleware' =>['auth','organization']], function () {
        Route::get('/', 'HomeController@index')->name('dashboard');
        // organization
        Route::post('organizations/media', 'RegisterController@storeMedia')->name('storeMedia');
        Route::post('organizations/ckmedia', 'RegisterController@storeCKEditorImages')->name('storeCKEditorImages');
        Route::post('users/media', 'RegisterController@storeMedia')->name('users.storeMedia');
        // beneficiaries
        Route::get('beneficiaries', 'BeneficiaryController@index')->name('beneficiary.index');
        Route::get('beneficiaries/show', 'BeneficiaryController@show')->name('beneficiary.show');
        Route::get('add-beneficiary', 'BeneficiaryController@create')->name('beneficiary.create');
        // building
        Route::get('building', 'BuildingController@index')->name('building.index');
        Route::get('add-building', 'BuildingController@create')->name('building.create');
        
});
