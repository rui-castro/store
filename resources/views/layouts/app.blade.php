<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Galeiras - Store</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" sizes="16x16"/>

    <link href="{{ elixir('css/app.css') }}" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-default navbar-fixed-top navbar-main">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img alt="Galeiras" src="{{ asset('images/logo-211x51.png') }}"/>
            </a>
            <!--
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-main-collapse" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            -->
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <!--
        <div class="collapse navbar-collapse" id="navbar-main-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Link</a></li>
            </ul>
        </div>
        -->
    </div>
</nav>

@yield('content')

<script src="{{ elixir('js/app.js') }}"></script>
</body>
</html>