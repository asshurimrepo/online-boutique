<div class="col-md-10 col-md-offset-1">
    {{--Background Images--}}
    <div style="background: #FCFCFC;" >
        <img src="{{ $product->present()->image }}" width="100%" height="600"
             class="reel img-responsive elem-center"
             data-opening="1"
             data-delay="5"
             data-speed=".2"
             data-images="{{ $product->present()->imgSequence }}" />
    </div>



</div>
