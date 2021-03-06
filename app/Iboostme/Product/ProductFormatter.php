<?php namespace Iboostme\Product;

use Product;
use ProductFrame;
use ProductBackground;

class ProductFormatter {
    public function bulkFormat( $products ){
        $result = array();
        if($products->count() > 0){
            foreach($products as $i => $product){
                $result[] = $this->format($product);
            }
        }
        return $result;
    }
    public function frameBulkFormat( $list ){
        $result = array();
        if($list->count() > 0){
            foreach($list as $i => $item){
                $result[] = $this->frameFormat($item);
            }
        }
        return $result;
    }
    public function backgroundBulkFormat( $list ){
        $result = array();
        if($list->count() > 0){
            foreach($list as $i => $item){
                $result[] = $this->backgroundFormat($item);
            }
        }
        return $result;
    }

    public function format( Product $product ){
        $result  = [
            'id' => $product->id,
            'category_id' => $product->category_id,
            'type_id' => $product->type_id,
            'brand_id' => $product->brand_id,
            'status_id' => $product->status_id,
            'url' => $product->present()->url,
            'title' => $product->present()->title,
            'category' => $product->present()->category,
            'size' => $product->present()->size,
            'width' => $product->present()->width,
            'height' => $product->present()->height,
            'price' => $product->present()->price,
            'priceMark' => $product->present()->priceMark,
            'excerpt' => $product->present()->excerpt,
            'content' => $product->present()->content,
            'views' => $product->views,
            'statusClass' => $product->present()->statusClass,
            'status' => $product->present()->status,
            'statusObject' => $product->status,
            'is_available' => $product->is_available,
            'imageThumb' => $product->present()->image,
            'imageSquare' => $product->present()->imageWithType('square'),
            'imageHorizontal' => $product->present()->imageWithType('horizontal'),
            'imageVertical' => $product->present()->imageWithType('vertical'),
            'imagePreview' => $product->present()->imageWithType('preview'),
	        'imgSequence' => $product->present()->imgSequence,
	        'vs_bust' => $product->vs_bust,
	        'vs_waist' => $product->vs_waist,
	        'vs_hips' => $product->vs_hips,
        ];

        return $result;
    }
    public function frameFormat( ProductFrame $frame ){
        return [
            'id' => $frame->id,
            'name' => $frame->name,
            'slug' => $frame->slug,
            'is_active' => $frame->is_active,
            'imagePath' => asset('uploads/products/frames/square/'.$frame->image),
            'imageSquare' => asset('uploads/products/frames/square/'.$frame->image),
            'imageHorizontal' => asset('uploads/products/frames/horizontal/'.$frame->image),
            'imageVertical' => asset('uploads/products/frames/vertical/'.$frame->image),
        ];
        return $result;
    }
    public function backgroundFormat( ProductBackground $background ){
        return [
            'id' => $background->id,
            'name' => $background->name,
            'slug' => $background->slug,
            'is_active' => $background->is_active,
            'imagePath' => asset('uploads/products/backgrounds/'.$background->image)
        ];
        return $result;
    }




} 