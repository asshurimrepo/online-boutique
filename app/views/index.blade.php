@extends('layout.default')
@section('footer')
    {{ link_js('assets/rwdImageMaps/jQuery.rwdImageMaps.js') }}
    <script>
        $(function(){
            $('img[usemap]').rwdImageMaps();
        });
    </script>
@stop
@section('content')
    <!-- Header -->
    <div  class="owl-carousel owl-theme spotlight-slider">

        <div class="item"><img class="img-responsive" src="{{ asset('img/banner.jpg') }}" alt="Wear your own fashion" /></div>
        <div class="item"><img class="img-responsive" src="{{ asset('img/banner1.jpg') }}" alt="Wear your own fashion" /></div>
        <div class="item"><img class="img-responsive" src="{{ asset('img/banner2.jpg') }}" alt="Wear your own fashion" /></div>

    </div>



    <!-- Collections Section -->
    <section id="collections">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center space-sm">
                    <h2 class="section-heading">Collections</h2>
                </div>
            </div>
            <div class="row frames">
                @if( $products->count() > 0 )
                    @foreach($products as $i => $product)
                        <div class="col-md-3 col-sm-6 item ">
                            @include('listing.product')
                        </div>
                    @endforeach
                @else
                    <div class="alert alert-danger alert-sm" role="alert">
                        <b>{{ PRODUCT_EMPTY }}</b>
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col-md-12 text-center space-md">
                    <a href="{{ route('arrivals') }}" class="btn btn-default btn-lg">Browse</a>
                </div>
            </div>
        </div>
    </section>


        <section class="border-top border-bottom" id="must-have">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 item border-right">
                        <h2 class="section-heading">Must Have</h2>

                        <div class="row">
                            @if( $mustHaves->count() > 0)
                                @foreach($mustHaves as $i => $product)


                                    <div class="col-md-6">
                                        <a href="{{ $product->present()->url }}"><img src="{{ $product->present()->image('square') }}" class="img-responsive elem-center"></a>
                                        <h4 class="title"><a href="{{ $product->present()->url }}" class="normal-link">{{ $product->present()->title }}</a></h4>
                                        <div class="description">
                                            <p>{{ $product->present()->excerpt(60) }}</p>
                                        </div>
                                    </div>
                                    @if( $i % 2 == 1 )
                                        <div class="col-md-12"></div>
                                    @endif
                                @endforeach
                            @endif



                        </div>
                        <div class="col-md-12 text-center space-sm">
                            <a href="{{ route('arrivals') }}" class="btn btn-default btn-lg">Browse</a>
                        </div>
                    </div>
                    <div class="col-md-5 item">
                        <h2 class="section-heading">Ukay of the Week</h2>
                        <a href="{{ $product->present()->url }}"><img src="{{ $product->present()->image }}" class="img-responsive"></a>
                        {{--<ul class="list-inline pull-right">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>--}}
                        <h4 class="title"><a href="{{ $product->present()->url }}" class="normal-link">{{ $product->present()->title }}</a></h4>
                        <div class="description">
                            <p>{{ $product->present()->excerpt() }}</p>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
        </section>


        <section id="testimony">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <p class="content">
                            <img src="{{ asset('img/qoute-left.png') }}" class="qoute-left">
                            Ukay is an Online Boutique is the Philippines Home of middle class brands for your Fashion Designs and Grooming.
                            <img src="{{ asset('img/qoute-right.png') }}" class="qoute-right">
                        </p>
                    </div>
                </div>
            </div>
        </section>
@stop