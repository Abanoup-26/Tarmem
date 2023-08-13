<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/media', 'UsersController@storeMedia')->name('users.storeMedia');
    Route::post('users/ckmedia', 'UsersController@storeCKEditorImages')->name('users.storeCKEditorImages');
    Route::post('users/parse-csv-import', 'UsersController@parseCsvImport')->name('users.parseCsvImport');
    Route::post('users/process-csv-import', 'UsersController@processCsvImport')->name('users.processCsvImport');
    Route::post('users/update_statuses', 'UsersController@update_statuses')->name('users.update_statuses');
    Route::resource('users', 'UsersController');


    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Illnesstype
    Route::delete('illnesstypes/destroy', 'IllnesstypeController@massDestroy')->name('illnesstypes.massDestroy');
    Route::resource('illnesstypes', 'IllnesstypeController');

    // Contractor Types
    Route::delete('contractor-types/destroy', 'ContractorTypesController@massDestroy')->name('contractor-types.massDestroy');
    Route::resource('contractor-types', 'ContractorTypesController');

    // Contractor Serviece Types
    Route::delete('contractor-serviece-types/destroy', 'ContractorServieceTypesController@massDestroy')->name('contractor-serviece-types.massDestroy');
    Route::resource('contractor-serviece-types', 'ContractorServieceTypesController');

    // Organization Types
    Route::delete('organization-types/destroy', 'OrganizationTypesController@massDestroy')->name('organization-types.massDestroy');
    Route::resource('organization-types', 'OrganizationTypesController');

    // Organizations
    Route::delete('organizations/destroy', 'OrganizationsController@massDestroy')->name('organizations.massDestroy');
    Route::post('organizations/media', 'OrganizationsController@storeMedia')->name('organizations.storeMedia');
    Route::post('organizations/ckmedia', 'OrganizationsController@storeCKEditorImages')->name('organizations.storeCKEditorImages');
    Route::resource('organizations', 'OrganizationsController');

    // Contractors
    Route::delete('contractors/destroy', 'ContractorsController@massDestroy')->name('contractors.massDestroy');
    Route::post('contractors/media', 'ContractorsController@storeMedia')->name('contractors.storeMedia');
    Route::post('contractors/ckmedia', 'ContractorsController@storeCKEditorImages')->name('contractors.storeCKEditorImages');
    Route::resource('contractors', 'ContractorsController');

    // Supporter
    Route::delete('supporters/destroy', 'SupporterController@massDestroy')->name('supporters.massDestroy');
    Route::resource('supporters', 'SupporterController');

    // Buildings
    Route::post('buildings/media', 'BuildingsController@storeMedia')->name('buildings.storeMedia');
    Route::post('buildings/ckmedia', 'BuildingsController@storeCKEditorImages')->name('buildings.storeCKEditorImages');
    Route::resource('buildings', 'BuildingsController');

    // Beneficiary
    Route::post('beneficiaries/media', 'BeneficiaryController@storeMedia')->name('beneficiaries.storeMedia');
    Route::post('beneficiaries/ckmedia', 'BeneficiaryController@storeCKEditorImages')->name('beneficiaries.storeCKEditorImages');
    Route::resource('beneficiaries', 'BeneficiaryController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Beneficiary Family
    Route::post('beneficiary-families/media', 'BeneficiaryFamilyController@storeMedia')->name('beneficiary-families.storeMedia');
    Route::post('beneficiary-families/ckmedia', 'BeneficiaryFamilyController@storeCKEditorImages')->name('beneficiary-families.storeCKEditorImages');
    Route::resource('beneficiary-families', 'BeneficiaryFamilyController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Building Contractors
    Route::delete('building-contractors/destroy', 'BuildingContractorsController@massDestroy')->name('building-contractors.massDestroy');
    Route::post('building-contractors/media', 'BuildingContractorsController@storeMedia')->name('building-contractors.storeMedia');
    Route::post('building-contractors/ckmedia', 'BuildingContractorsController@storeCKEditorImages')->name('building-contractors.storeCKEditorImages');
    Route::resource('building-contractors', 'BuildingContractorsController');

    // Cities
    Route::delete('cities/destroy', 'CitiesController@massDestroy')->name('cities.massDestroy');
    Route::resource('cities', 'CitiesController');

    // Districts
    Route::delete('districts/destroy', 'DistrictsController@massDestroy')->name('districts.massDestroy');
    Route::resource('districts', 'DistrictsController');

    // Relatives
    Route::delete('relatives/destroy', 'RelativesController@massDestroy')->name('relatives.massDestroy');
    Route::resource('relatives', 'RelativesController');

    // Units
    Route::delete('units/destroy', 'UnitsController@massDestroy')->name('units.massDestroy');
    Route::resource('units', 'UnitsController');

    // Building Supporter
    Route::delete('building-supporters/destroy', 'BuildingSupporterController@massDestroy')->name('building-supporters.massDestroy');
    Route::resource('building-supporters', 'BuildingSupporterController');

    // Beneficiary Needs
    Route::post('beneficiary-needs/media', 'BeneficiaryNeedsController@storeMedia')->name('beneficiary-needs.storeMedia');
    Route::post('beneficiary-needs/ckmedia', 'BeneficiaryNeedsController@storeCKEditorImages')->name('beneficiary-needs.storeCKEditorImages');
    Route::resource('beneficiary-needs', 'BeneficiaryNeedsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    Route::get('global-search', 'GlobalSearchController@search')->name('globalSearch');
    Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
