<?php namespace Api;

use Input;

class SearchAPIController extends \BaseController {

	public function postSearch()
	{
		return ( new \SearchProduct() )->get();
	}

	public function getSearch()
	{
		return ( new \SearchProduct() )->get();
	}

}
