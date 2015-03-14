@extends('layout.admin')

@section('content')

    <section class="row user-panel edit-panel" ng-app="ukay">

        <div id="content-wrapper" class="cfix">
            <ul class="form-nav js-form-nav" role="tablist">
                <li><a href="#dashboard" data-section="basic_information" class="js-section-nav active">Overview</a>
                </li>
                <li><a href="#products" data-section="custom-section-1" class="js-section-nav">Products</a></li>
            </ul>

            <div class="form-contents">
                <div class="js-form-contents" ng-controller="OverviewCtrl">
                    <div class="form-block" id="basic_information-wrap">
                        <span id="dashboard" class="anchor js-named-anchor"
                              style="top: -133px; padding-top: 133px;"></span>

                        <h3 class="form-block-title">Overview</h3>

                        <ul class="list-group">
                            <li class="list-group-item">
                                <span class="badge">@{{ data.products }}</span>
                                <b>Products</b>
                            </li>

                            <li class="list-group-item">
                                <span class="badge">@{{ data.categories }}</span>
                                <b>Categories</b>
                            </li>

                            <li class="list-group-item">
                                <span class="badge">@{{ data.users }}</span>
                                <b>Users</b>
                            </li>
                        </ul>


                    </div>

                    <div class="form-block" ng-controller="ProductsCtrl" id="products">

                        <h3 class="form-block-title">Products</h3>

                        <div class="col-md-4 column productbox" ng-repeat="p in data">
                            <img style="height: 265px;" ng-src="@{{ p.imageThumb }}" class="img-responsive">
                            <div class="producttitle">@{{ p.title }}</div>
                            <div class="productprice">
                                <div class="pull-right">
                                    <a href="#" class="btn btn-link btn-xs" role="button">edit</i></a>
                                    <a href="#" class="btn btn-danger btn-xs" role="button">X</a>
                                </div>
                                <div class="pricetext">@{{ p.price  }}</div>
                            </div>
                        </div>

                        <div class="js-custom-section soc-custom-section">
                            <button class="btn-block add-custom-section add-custom-section-block form-block">
                                <i class="fa fa-plus"></i> Add New Product
                            </button>
                        </div>

                    </div>


                </div>

            </div>
        </div>
    </section>

@stop