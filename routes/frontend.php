<?php


Route::group(['as' => 'frontend.', 'namespace' => 'Frontend' ], function () {

        // organization
        Route::post('organizations/media', 'RegisterController@storeMedia')->name('organizations.storeMedia');
        Route::post('organizations/ckmedia', 'RegisterController@storeCKEditorImages')->name('organizations.storeCKEditorImages');
        Route::post('users/media', 'RegisterController@storeMedia')->name('users.storeMedia');
        // beneficiaries
        Route::get('beneficiaries', 'BeneficiaryController@index')->name('beneficiary.index');
        Route::get('beneficiaries/show', 'BeneficiaryController@show')->name('beneficiary.show');
        Route::get('add-beneficiary', 'BeneficiaryController@create')->name('beneficiary.create');
        // building
        Route::get('building', 'BuildingController@index')->name('building.index');
        Route::get('add-building', 'BuildingController@create')->name('building.create');
        // agency 
        Route::get('agency', 'AgencyController@index')->name('agency.index');
});

