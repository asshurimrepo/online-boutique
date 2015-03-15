<div class="visible-xs" style="margin-top: -50px;"></div>

<div ng-controller="singleProductController">

    <div class="col-md-2 no-pad">
        {{--Background Gallery--}}
        <div id="product_background_gallery" class="frame-thumbs pull-right" ng-repeat="product in products">
            <a href="@{{ product.url }}" style="cursor: pointer; display: block;" data-toggle="tooltip" title="@{{ product.title }}">
                <img ng-src="@{{ product.imageThumb }}" alt="" width="60" style="margin: 0" class="img-responsive" />
            </a>
        </div>
    </div>

    <div class="col-md-10 ">
        {{--Background Images--}}
        @if($product->present()->imgSequence)
            <div style="background: #FCFCFC;" class="o-3d-spin" >
                <img src="{{ $product->present()->image }}" width="100%" height="600"
                     class="reel img-responsive elem-center"
                     data-opening="1"
                     data-delay="5"
                     data-speed=".2"
                     data-images="{{ $product->present()->imgSequence }}" />
            </div>
        @else
            <img src="{{ $product->present()->image }}" width="100%" />
        @endif



    </div>
</div>
