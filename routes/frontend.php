<?php


Route::group(['as' => 'frontend.', 'namespace' => 'Frontend' ,'middleware' => 'web'], function () {
        Route::get('/', 'HomeController@index')->name('home');
        Route::get('register', 'RegisterController@index')->name('register');
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

