<?php  namespace Admin;

use Product;
use ProductCategory;
use User;

class ApiProviderController extends \BaseController {

	public function lists()
	{
		return [
			'overview' => route('api.overview'),
			'products' => route('api.products'),
		];
    }


	public function overview()
	{
		return [
			'categories' => ProductCategory::count(),
			'products' => Product::count(),
			'users' => User::count(),
		];
	}

	public function products()
	{
		return Product::orderBy('id','desc')->get();
	}

}
