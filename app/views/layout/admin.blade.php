<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ isset($pageTitle) ? $pageTitle . ' |' : '' }}  Ukay Outfits</title>

    <meta name="api_provider" content="{{ route('api.provider') }}" />

    {{ link_css('css/bootstrap.min.css') }}
    {{ link_css('assets/font-awesome/css/font-awesome.min.css') }}
    {{ link_css('admin_assets/css/edit.css') }}
    {{ link_css('admin_assets/css/text-list.css') }}
    {{ link_css('admin_assets/css/footer-infinity.css') }}
    {{ link_css('admin_assets/css/view.css') }}
</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Ukay Outfits</a>
        </div>

        <div class="collapse navbar-collapse" id="navigation">
            <div class="row">
                <ul class="nav navbar-nav navbar-right text-center">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-user"></i> <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ route('logout') }}"><i class="fa fa-sign-out"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

    @yield('content')


    {{ link_js('js/jquery.js') }} {{--jQuery--}}
    {{ link_js('js/bootstrap.min.js') }} {{--Bootstrap--}}
    {{ link_js('iboostme/js/angular/angular.js') }}{{--AngularJS--}}
    {{ link_js('js/admin.js') }}
    {{ link_js('js/admin_services.js') }}
</body>
</html>