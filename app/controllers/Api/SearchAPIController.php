<?php namespace Api;

use Iboostme\Search\SearchProduct;

class SearchAPIController extends \BaseController {

	public function postSearch()
	{
		return ( new SearchProduct() )->get();
	}

	public function getSearch()
	{
		return ( new SearchProduct() )->get();
	}

}
