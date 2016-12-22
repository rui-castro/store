<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Galeiras - Store</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" sizes="16x16" />

    <link href="{{ elixir('css/app.css') }}" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">
                <img alt="Galeiras" src="{{ asset('images/logo-211x51.png') }}" />
            </a>
        </div>
    </div>
</nav>

@yield('content')

<script src="{{ elixir('js/app.js') }}"></script>
</body>
</html>