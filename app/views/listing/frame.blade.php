<div class="col-md-10 col-md-offset-1">
    {{--Background Images--}}
    <div style="background: #FCFCFC;" >
        <img src="{{ $product->present()->image }}" width="100%" height="500px"
             class="reel img-responsive elem-center"
             id="image"
             data-opening="1"
             data-delay="5"
             data-speed=".2"
             data-images="{{ $product->present()->imgSequence }}" />
        {{--<img id="product_background"--}}
            {{--src='{{ $product->present()->image }}' class="img-responsive elem-center" />--}}

        {{--Design Image--}}


        {{--Frame Image--}}


    </div>


</div>
