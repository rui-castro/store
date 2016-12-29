<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Galeiras - Store Admin') }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" sizes="16x16"/>

    <!-- Styles -->
    <link href="{{ elixir('css/admin.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body class="{{ $route_parts }}">
    <div id="app">
        <nav class="navbar navbar-default navbar-fixed-top navbar-main">
            <div class="container-fluid">
                <div class="navbar-header">
                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ route('admin') }}">
                        <img alt="Galeiras" src="{{ asset('images/logo-211x51.png') }}"/>
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    @include('admin.layouts.navbar')
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ elixir('js/admin.js') }}"></script>
</body>
</html>
