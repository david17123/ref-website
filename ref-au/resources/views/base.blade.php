<!DOCTYPE html>
<html>
    <head>
        <title>REF AU</title>
        <link rel="shortcut icon" type="image/png" href="/img/favicon.png"/>

        {{-- Default JS and CSS to be included --}}
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
        <link rel="stylesheet" type="text/css" href="{{ elixir('css/base.css') }}"/>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script type="text/javascript" src="{{ elixir('js/base.js') }}"></script>

        {{-- Additional custom JS and CSS to be included based on page requirements --}}
        @stack('css')
        @stack('js')
    </head>
    <body>
        @yield('content')
    </body>
</html>
