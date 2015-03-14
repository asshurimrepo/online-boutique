<?php

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
