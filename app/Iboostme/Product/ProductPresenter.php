<?php namespace Iboostme\Product;
use Illuminate\Support\Str;
use Laracasts\Presenter\Presenter;
use Iboostme\Product\Wishlist\WishlistRepository;
use Illuminate\Support\Facades\Form;

class ProductPresenter extends Presenter{
	/**
	 * @return string
	 */
	public function url(){
        return route('post.single', [$this->entity->id, $this->entity->slug]);
    }

	/**
	 * @return string
	 */
	public function title(){
        if($this->entity->title){
            $title = preg_replace( "/^\.+|\.+$/", "", $this->entity->title );
            return Str::limit(ucwords($title), 40, '');
        }

        return 'Untitled';

    }

	/**
	 * @return string
	 */
	public function category(){
        return ucfirst($this->entity->category->name);
    }

	/**
	 * @return string
	 */
	public function size(){
        return $this->entity->width . 'x' . $this->entity->height;
    }

	/**
	 * @return mixed
	 */
	public function price(){
        return $this->entity->price;
    }

	/**
	 * @return string
	 */
	public function priceMark(){
        return "{{ main.currencyConvert(".$this->entity->price.", main.inCurrency, main.outCurrency ) | currency : main.outCurrency + ' ' }}";
    }

	/**
	 * @return string
	 */
	public function totalAmount(){
        return "{{ main.currencyConvert(".$this->entity->price.", main.inCurrency, main.outCurrency ) | currency : main.outCurrency + ' ' }}";
    }

	/**
	 * @param $quantity
	 *
	 * @return mixed
	 */
	public function totalPrice( $quantity ){
        return $quantity * $this->entity->price;
    }

	/**
	 * @param int $limit
	 *
	 * @return string
	 */
	public function excerpt($limit = 100){
        $excerpt = $this->entity->content;
        if($this->entity->excerpt){
            $excerpt = $this->entity->excerpt;
        }

        return Str::limit($excerpt, $limit, '');
    }

	/**
	 * @return mixed
	 */
	public function content(){
        $content = $this->entity->content;
        return $content;
    }

	/**
	 * @return string
	 */
	public function type(){
        return ucfirst($this->entity->type->name);
    }

	/**
	 * @return mixed
	 */
	public function status(){
        return $this->entity->status->name;
    }

	/**
	 * @return string
	 */
	public function statusClass(){
        $class = '';
        switch($this->entity->status->slug){
            case 'new':
                $class = ' ribbon-green';
                break;
            case 'feature';
                $class = ' ribbon-red';
                break;
        }
        return $class;
    }

	/**
	 * @return string
	 */
	public function wishlistLabel(){
        $repo = new WishlistRepository();
        $output = '';
        if($repo->isExists($this->entity)) {
            $output .= Form::hidden('action', 'remove');
            $output .= '<button class="btn btn-default btn-vivid btn-lg btn-block btn-purchase"><i class="fa fa-heart"></i> Remove to Wishlist</button>';
        }else{
            $output .= Form::hidden('action', 'add');
            $output .= '<button class="btn btn-default btn-vivid btn-lg btn-block btn-purchase"><i class="fa fa-heart"></i> Add to Wishlist</button>';
        }
        return $output;
    }

	/**
	 * @return bool|string
	 */
	public function wishlistDate(){
        return date('m-d-Y', strtotime($this->entity->wishlist->created_at));
    }

	/**
	 * @param string $type
	 *
	 * @return string
	 */
	public function image( $type = '' ){
        return asset("uploads/products/thumbs/{$this->entity->image}" );
    }

	/**
	 * @return string
	 */
	public function imgSequence()
	{
		$files = \File::files("uploads/products/{$this->entity->id}");

		$a = reset($files);
		$b = end($files);

		$a = explode('/', $a);
		$b = explode('/', $b);

		if(! isset($a[3])){

			return null;

		}


		$a = str_replace(array('.jpg', '.png'), "", $a[3]);
		$b = str_replace(array('.jpg', '.png'), "", $b[3]);

		return asset("uploads/products/{$this->entity->id}/##.png|{$a}..{$b}");
	}

	/**
	 * @param $type
	 *
	 * @return string
	 */
	public function imageWithType( $type ){
        return asset('uploads/products/designs/'.$type.'/' . $this->entity->image);
    }

	/**
	 * @return string
	 */
	public function imagePreview(){
        return asset('uploads/products/designs/preview/' . $this->entity->image);
    }

	/**
	 * @return mixed
	 */
	public function imageType(){
        return $this->entity->image_type;
    }

	/**
	 * @return mixed
	 */
	public function imageOriginalType(){
        return $this->entity->image_original_type;
    }
}
