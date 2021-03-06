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

                @if(Session::has('success'))
                    <div class="alert alert-success"><i class="fa fa-check"></i> <b>{{ Session::get('success') }}</b></div>
                @endif

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

                    <div class="form-block" ng-controller="ProductsCtrl">
                        <span id="products" class="anchor js-named-anchor"
                              style="top: -101px; padding-top: 133px;"></span>

                        <h3 class="form-block-title">Products</h3>

                        <div class="js-custom-section soc-custom-section" ng-hide="isAdding || isEditing">
                            <button ng-click="addNew()"
                                    class="btn-block add-custom-section add-custom-section-block form-block">
                                <i class="fa fa-plus"></i> Add New Product
                            </button>
                        </div>

                        <div class="js-custom-section soc-custom-section" ng-show="isAdding || isEditing">
                            <button ng-click="cancel()"
                                    class="btn-block text-danger add-custom-section add-custom-section-block form-block">
                                <i class="fa fa-times"></i> Cancel
                            </button>
                        </div>


                        <div ng-show="isAdding">
                            @include('admin.add_product_form')
                        </div>

                        <div ng-show="isEditing">
                            @include('admin.edit_product_form')
                        </div>

                        <div class="shim-wrap" ng-hide="isAdding || isEditing">
                            <div class="form-item form-item-text be-placeholder" id="website-container">
                                <input type="text" ng-model="search" class="form-text form-text-normal"
                                       placeholder="Filter Products">
                            </div>
                            <div class="shim"><i class="fa fa-search"></i></div>
                        </div>

                        <div class="text-center" ng-show="data.length < 1">
                            <h1><i class="fa fa-spinner fa-spin"></i></h1>
                        </div>

                        <div class="row product-wrap" ng-hide="isAdding || isEditing">
                            <div class="col-md-4 column productbox" ng-repeat="p in data | filter:search">
                                <img style="height: 265px;" ng-src="@{{ p.imageThumb }}" class="img-responsive">

                                <div class="producttitle">@{{ p.title }}</div>
                                <div class="productprice">
                                    <div class="pull-right">
                                        <a href="#" ng-click="editProduct(p)" class="btn btn-link btn-xs" role="button">edit</i></a>
                                        <a href="#" class="btn btn-danger btn-xs" role="button">X</a>
                                    </div>
                                    <div class="pricetext">@{{ p.price  }}</div>
                                </div>
                            </div>
                        </div>


                    </div>


                </div>

            </div>
        </div>
    </section>

@stop