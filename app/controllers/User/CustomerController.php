<?php namespace User;
use Iboostme\Product\ProductRepository;
use Iboostme\User\Customer\ShippingAddressRepository;
use Iboostme\User\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Iboostme\Product\Wishlist\WishlistRepository;
use Product;
use ShippingAddress;
use User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Iboostme\Transaction\TransactionRepository;

class CustomerController extends \BaseController {
	protected $productRepo;

	public function __construct( ProductRepository $productRepo ){
		$this->productRepo = $productRepo;
	}

	public function getAccount(){
		$this->data['user'] = Auth::user();
		return View::make('user.account', $this->data);
	}

	public function getWishList(){

		$products = $this->productRepo->getWishlist();

		$this->data['products'] = $products;
		return View::make('user.wishlist', $this->data);
	}

	public function getTrackingOrder(){
		$repo = new TransactionRepository();
		$transactions = $repo->getUserTransaction();

		$this->data['transactions'] = $transactions;
		return View::make('user.tracking', $this->data);
	}

	public function getPassword(){
		$this->data['user'] = Auth::user();
		return View::make('user.change-password', $this->data);
	}

	public function addWishList(){
		if( !Auth::check() ){
			return Redirect::route('login', ['redirect' => route('customer.wishlist.add', ['product' => Input::get('product'), 'action' => 'redirect'])]);
		}

		$product = Product::find( Input::get('product') );
		$action = Input::get('action');
		$repo = new WishlistRepository();

		if(!$product){
			if( $action == 'redirect' ){
				return Redirect::route( 'customer.wishlist' )->with('error', WISHLIST_ADD_ERROR);
			}
			return Redirect::back()->with('error', WISHLIST_ADD_ERROR);
		}


		$msg = WISHLIST_ADDED;
		if( $action == 'remove'){
			$repo->remove( $product );
			$msg = WISHLIST_REMOVED;
		}
		else if($repo->isExists($product)){
			return Redirect::route( 'customer.wishlist' )->with('error', 'Already added to your wishlist');
		}
		else{
			$repo->add( $product );
		}

		if( $action == 'redirect' ){
			return Redirect::route( 'customer.wishlist' )->with('success', $msg);
		}
		return Redirect::back()->with('success', $msg);
	}

	public function addShipmentAddress(){
		$repo = new ShippingAddressRepository();
		$shipAddress = ShippingAddress::find( Input::get('shipping_address') );

		if( $repo->isMax( Auth::user() ) )
			return Redirect::back()->with('error', ADDRESS_MAXIMUM);

		if($shipAddress){
			$shipAddress->update( Input::all() );
			$msg = ADDRESS_UPDATED;
		}else{
			$repo->add( Input::all() );
			$msg = ADDRESS_ADDED;
		}
		return Redirect::back()->with('success', $msg);
	}

	public function changePassword(){
		$rules = array(
			'old_password'                  => 'required',
			'new_password'                  => 'required|confirmed|different:old_password',
			'new_password_confirmation'     => 'required|different:old_password|same:new_password'
		);

		$user = User::find(Auth::user()->id);
		$validator = Validator::make(Input::all(), $rules);

		//Is the input valid? new_password confirmed and meets requirements
		if ($validator->fails()) {
			Session::flash('validationErrors', $validator->messages());
			return Redirect::back()->withInput()->withErrors( $validator );
		}

		//Is the old password correct?
		if(!Hash::check(Input::get('old_password'), $user->password)){
			return Redirect::back()->withInput()->with('error', PASSWORD_WRONG);
		}

		//Set new password to user
		$user->password = Input::get('new_password');
		$user->password_confirmation = Input::get('new_password_confirmation');

		$user->touch();
		$save = $user->save();

		return Redirect::to('logout')->with('success', PASSWORD_UPDATED);
	}

	public function updateAccount(){
		$repo = new UserRepository();
		$repo->update( Input::all() );
		return Redirect::back()->with('success', ACCOUNT_UPDATED);
	}
}