<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Galeiras - Store') }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" sizes="16x16"/>

    <!-- Styles -->
    <link href="{{ elixir('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>

<body class="{{ $route_parts }}">
@include('common.analyticstracking')
<div id="app">
    @include('layouts.navbar')
    @yield('content')
</div>

<!-- Scripts -->
<script src="{{ elixir('js/app.js') }}"></script>
</body>
</html>