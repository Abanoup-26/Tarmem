<?php


Route::group(['prefix' => 'organization', 'as' => 'organization.', 'namespace' => 'Organization', 'middleware' => ['auth', 'organization']], function () {
        Route::get('/', 'HomeController@index')->name('dashboard');
        // beneficiaries
        Route::get('beneficiaries', 'BeneficiaryController@index')->name('beneficiary.index');
        Route::get('beneficiaries/show/{id}', 'BeneficiaryController@show')->name('beneficiary.show');
        Route::post('beneficiaries/store', 'BeneficiaryController@store')->name('beneficiary.store');
        Route::get('beneficiaries/create', 'BeneficiaryController@create')->name('beneficiary.create');
        Route::get('beneficiaries/edit/{id}', 'BeneficiaryController@edit')->name('beneficiary.edit');
        Route::post('beneficiaries/update/{id}', 'BeneficiaryController@update')->name('beneficiary.update');

        // beneficiary family 
        Route::post('beneficiary-families/store', 'BeneficiaryFamilyController@store')->name('beneficiary-families.store');
        Route::post('beneficiary-families/media', 'BeneficiaryFamilyController@storeMedia')->name('beneficiary-families.storeMedia');
        Route::post('beneficiary-families/ckmedia', 'BeneficiaryFamilyController@storeCKEditorImages')->name('beneficiary-families.storeCKEditorImages');
        Route::post('beneficiary-families/{id}', 'BeneficiaryFamilyController@destroy')->name('beneficiary-families.destroy');

        // beneficiary
        Route::post('beneficiaries/media', 'BeneficiaryController@storeMedia')->name('beneficiaries.storeMedia');
        Route::post('beneficiaries/ckmedia', 'BeneficiaryController@storeCKEditorImages')->name('beneficiaries.storeCKEditorImages');
        Route::post('beneficiary-needs/media', 'BeneficiaryController@storeMedia')->name('beneficiary-needs.storeMedia');
        Route::post('beneficiary-needs/ckmedia', 'BeneficiaryController@storeCKEditorImages2')->name('beneficiary-needs.storeCKEditorImages');
        Route::post('beneficiary-families/media', 'BeneficiaryController@storeMedia')->name('beneficiary-families.storeMedia');
        Route::post('beneficiary-families/ckmedia', 'BeneficiaryController@storeCKEditorImages3')->name('beneficiary-families.storeCKEditorImages');
        // building
        Route::get('building', 'BuildingController@index')->name('building.index');
        Route::get('show-building/{id}', 'BuildingController@show')->name('building.show');
        Route::post('store-building', 'BuildingController@store')->name('building.store');
        Route::get('add-building', 'BuildingController@create')->name('building.create');
        Route::get('edit-building/{id}', 'BuildingController@edit')->name('building.edit');
        Route::post('update-building/{id}', 'BuildingController@update')->name('building.update');
        Route::post('buildings/media', 'BuildingController@storeMedia')->name('buildings.storeMedia');
        Route::post('buildings/ckmedia', 'BuildingController@storeCKEditorImages')->name('buildings.storeCKEditorImages');
        Route::get('buildings/send/{id}', 'BuildingController@send')->name('building.send');
});
