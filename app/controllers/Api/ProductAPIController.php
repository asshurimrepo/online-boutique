<?php namespace Api;
use Iboostme\Product\ProductFormatter;
use Iboostme\Product\ProductRepository;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Input;
use Product;
use DB;
use ProductStatus;
class ProductAPIController extends \BaseController  {
    public $productRepo;
    public $productFormatter;
    public $take = 20;
    public $page = 1;
    public $offset = 1;

    public function __construct(ProductRepository $productRepo, ProductFormatter $productFormatter){
        $this->productRepo = $productRepo;
        $this->productFormatter = $productFormatter;

        $this->take = Input::get('take') ? Input::get('take') : $this->take;
        $this->page = Input::get('page') ? Input::get('page') : $this->page;
    }

    public function getNewArrivals(){
        $paginator = $this->productRepo->getNewArrivals()->paginate( $this->take );

        return $this->mapData( $paginator );
    }

    public function getBestSelling(){
        $paginator = $this->productRepo->getBestSelling()->orderBy('created_at', 'DESC')->paginate( $this->take );
        return $this->mapData( $paginator );
    }

    public function getCategory( $slug ){
        $category = $this->productRepo->category($slug);
        $paginator = $this->productRepo->getProductsByCategory( $category )->orderBy('created_at', 'DESC')->paginate( $this->take );
        return $this->mapData( $paginator );
    }

    public function getByType($slug){
        $type = $this->productRepo->type($slug);
        $paginate = $this->productRepo->getProductsByType( $type )->paginate( $this->take );
        return $this->mapData( $paginate );
    }

    public function getByBrand($slug){
        $brand = $this->productRepo->brand($slug);
        $paginate = $this->productRepo->getProductsByBrand( $brand )->paginate( $this->take );
        return $this->mapData( $paginate );
    }

    // viewable by admin only
    public function getByStatus(){
        $status = Input::get('status');
        if(!$status){
            $paginate = Product::paginate( $this->take );
        }
        else{
            $productStatus = $this->productRepo->status( $status );
            $paginate = Product::where('status_id', $productStatus->id)->paginate( $this->take );
        }

        return $this->mapData( $paginate );
    }

    // viewable by admin only
    public function getFrameNavigation(){
        $statuses = [];

        // new navigation
        $statuses[] = [
            'name' => 'All',
            'slug' => '',
            'total_products' => Product::get()->count(),
            'link' => route('admin.design.manage')
        ];

        $product_statuses = ProductStatus::get();
        foreach( $product_statuses as $status ){
            $products = Product::where('status_id', $status->id)->get();
            if( $products->count() > 0 ){
                $status->total_products = $products->count();
                $status->link =  route('admin.design.manage', ['status'=>$status->slug]);
                $statuses[] = $status;
            }
        }

        return ['navigation' => $statuses];
    }

    // map paginator data
    private function mapData( Paginator $paginator ){
        $products = $this->productFormatter->bulkFormat($paginator);
        return [
            'products' => $products,
            'currentPage' => $paginator->getCurrentPage(),
            'lastPage' => $paginator->getLastPage(),
            'getTotal' => $paginator->getTotal(),
            'getPerPage' => $paginator->getPerPage(),
            'count' => $paginator->count()
        ];
    }
} 