<?php namespace Admin;

use Input;
use Redirect;
use Str;

class ProductsController extends \BaseController {

	public function store()
	{
		$file            = Input::file( 'image' );
		$destinationPath = 'uploads/products/thumbs';
		$filename        = Str::random() . $file->getClientOriginalName();
		Input::file( 'image' )->move( $destinationPath, $filename );

		$input              = Input::all();
		$input['image']     = $filename;
		$input['type_id']   = 1;
		$input['status_id'] = 4;

		\Product::create( $input );

		return Redirect::back()->with('success', 'Successfully Saved!');

	}

}
