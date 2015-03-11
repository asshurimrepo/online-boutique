<?php  namespace Api; 

use Input;

class SearchAPIController extends \BaseController {

	public function postSearch()
	{
		return Input::all();
	}

	public function getSearch()
	{

	}

}
