<!DOCTYPE html>
<html lang="en" ng-app="wallOfFrame">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ isset($pageTitle) ? $pageTitle . ' |' : '' }}  Ukay Outfits</title>

    <!-- Bootstrap Core CSS -->
    {{ link_css('css/bootstrap.min.css') }}
    {{ link_css('css/style.css') }}
    {{ link_css('css/utils.css') }}
    {{ link_css('css/media.css') }}
    {{ link_css('css/range.css') }}
    {{ link_css('assets/font-awesome/css/font-awesome.min.css') }}
    {{ link_css('assets/owl-carousel/owl.carousel.css') }}
    {{ link_css('assets/owl-carousel/owl.theme.css') }}
    {{ link_css('assets/datatables/jquery.dataTables.css') }}



    <!-- Digital Countdown Timer -->
    {{ link_js('assets/countdown/countdown.js') }}



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    @yield('header')


</head>
    <body ng-controller="MainController as main" ng-cloak>
        @yield('layout')

        {{ link_js('js/jquery.js') }} {{--jQuery--}}
        {{ link_js('js/bootstrap.min.js') }} {{--Bootstrap--}}
        {{ link_js('iboostme/js/angular/angular.js') }}{{--AngularJS--}}
        {{ link_js('assets/owl-carousel/owl.carousel.js') }} {{--OwlCarousel--}}
        {{ link_js('assets/datatables/jquery.dataTables.min.js') }} {{--DataTables--}}
        {{ link_js('iboostme/wallofframe/main.js') }}

        {{--Angular Modules--}}
        {{ link_js('iboostme/js/angular/angular-slider/angular-slider.js') }}
        {{ link_js('iboostme/js/angular/currency/finance.js') }}
        {{ link_js('iboostme/js/angular/ngFlow/ng-flow.js') }}
        {{ link_js('iboostme/js/angular/ngFlow/ng-flow-standalone.js') }}

        <script>
            var mainApp = {};
            var app = angular.module("wallOfFrame", ['uiSlider', 'finance', 'flow']);
            
            mainApp.baseUrl = "{{ url() }}";
        </script>

        {{--Angular Controllers--}}
        {{ link_js('iboostme/wallofframe/angular/MainController.js') }}

        {{--Angular Services--}}
        {{ link_js('iboostme/wallofframe/angular/services/ProductService.js') }}

        @yield('footer')
    </body>

</html>