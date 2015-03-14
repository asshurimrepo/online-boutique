<?php

	//Contact
	Route::group( [ 'before' => 'auth', 'prefix' => 'admin/contact', 'namespace' => 'Admin' ], function () {
		Route::get('/', [ 'before' => 'auth', 'as' => 'contacts.index', 'uses' => 'ContactController@index' ]);
		Route::get('edit/{id}', [ 'before' => 'auth', 'as' => 'contacts.edit', 'uses' => 'ContactController@edit' ]);
		Route::post('store', [ 'before' => 'auth', 'as' => 'contacts.store', 'uses' => 'ContactController@store' ]);
		Route::post('update', [ 'before' => 'auth', 'as' => 'contacts.update', 'uses' => 'ContactController@update' ]);
		Route::post('delete', [ 'before' => 'auth', 'as' => 'contacts.delete', 'uses' => 'ContactController@destroy' ]);
	} );

Route::group( [ 'before' => ['auth', 'auth.admin.only'], 'prefix' => 'admin', 'namespace' => 'Admin' ], function (){

    Route::get('account', ['as' => 'admin.dashboard.index', 'uses' => 'DashboardController@index' ]);


	/*
	 * @route api-provider
	 * @name api.provider
	 * @uses ApiProviderController@lists
	 * */
	Route::get( 'api-provider', [
		'as'   => 'api.provider',
		'uses' => 'ApiProviderController@lists'
	] );

	/*
	 * @route api-overview
	 * @name api.overview
	 * @uses ApiProviderController@overview
	 * */
	Route::get( 'api-overview', [
		'as'   => 'api.overview',
		'uses' => 'ApiProviderController@overview'
	] );

	/*
	 * @route api-products
	 * @name api.products
	 * @uses ApiProviderController@products
	 * */
	Route::get( 'api-products', [
		'as'   => 'api.products',
		'uses' => 'ApiProviderController@products'
	] );

});
