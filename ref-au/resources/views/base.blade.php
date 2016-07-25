<!DOCTYPE html>
<html>
    <head>
        <title>REF AU</title>
        <link rel="shortcut icon" type="image/png" href="/img/favicon.png"/>

        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
        <link rel="stylesheet" type="text/css" href="{{ elixir('css/base.css') }}"/>
        @stack('css')
        @stack('js')
    </head>
    <body>
        @yield('content')
    </body>
</html>
