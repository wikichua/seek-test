<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Wiki Chua">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>SEEK Test</title>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="//alertifyjs.com/build/css/alertify.css">
        <link rel="stylesheet" href="//alertifyjs.com/build/css/themes/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="{{ route('home') }}">SEEK Test</a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li class="{{ activeOnCurrentRoute('home') }}"><a href="{{ route('home') }}"><i class="glyphicon glyphicon-home"></i> Home</a></li>
                            <li class="{{ activeOnCurrentRoute('customer') }}"><a href="{{ route('customer') }}"><i class="glyphicon glyphicon-king"></i> Customers</a></li>
                            <li class="{{ activeOnCurrentRoute('item') }}"><a href="{{ route('item') }}"><i class="glyphicon glyphicon-blackboard"></i> Ads Items</a></li>
                            <li class="{{ activeOnCurrentRoute('pricing_rule') }}"><a href="{{ route('pricing_rule') }}"><i class="glyphicon glyphicon-scale"></i> Pricing Rules</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        <div class="container">
            @yield('body')
        </div>

        <script src="//code.jquery.com/jquery-3.1.0.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="//alertifyjs.com/build/alertify.js"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        @yield('scripts')

        @include('alert')
    </body>
</html>
