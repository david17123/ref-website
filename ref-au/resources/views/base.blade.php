<!DOCTYPE html>
<html>
    <head>
        @inject('sitePage', 'App\HelperClasses\SitePageService')
        <title>{{ $sitePage->getSiteTitle() }}</title>
        <link rel="shortcut icon" type="image/png" href="/img/favicon.png"/>

        {{-- Meta tags --}}
        {!! $sitePage->getMetaTags(true) !!}

        {{-- Default JS and CSS to be included --}}
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
        <link rel="stylesheet" type="text/css" href="{{ elixir('css/base.css') }}"/>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script type="text/javascript" src="{{ elixir('js/base.js') }}"></script>

        <script type="text/javascript">
            var PageVars = {!! $sitePage->getJavascriptVars() ? json_encode($sitePage->getJavascriptVars()) : '{}' !!};
        </script>

        {{-- Additional custom JS and CSS to be included based on page requirements --}}
        @stack('css')
        @stack('js')
    </head>
    <body>
        @yield('content')
    </body>
</html>
