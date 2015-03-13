<?php
use Iboostme\Product\ProductRepository;

class HomeController extends BaseController {

	public $productRepo;

	public function __construct(ProductRepository $productRepo){
		$this->productRepo = $productRepo;
	}

	public function index()
	{
		$this->data['mustHaves'] = $this->productRepo->getByRandom( 4 )->get();
		$this->data['products'] = $this->productRepo->getByRandom( 4 )->get();
		$this->data['product'] = Product::first(); // frame of the week
		$this->data['url_collection'] = route('browse.type', ['collections']);



		/*$files =  File::files('uploads/products/1');
		$a = reset($files);
		$b = end($files);

		$a = explode('/', $a);
		$b = explode('/', $b);

		$a = str_replace(array('.jpg', '.png'), "", $a[3]);
		$b = str_replace(array('.jpg', '.png'), "", $b[3]);
		return $a.$b;*/

		return View::make('index', $this->data);
	}


}
