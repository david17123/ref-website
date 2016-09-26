{{--
Typical layout of header-content-footer
--}}

@extends('base')

@push('js')
    <script type="text/javascript" src="{{ elixir('js/defaultLayout.js') }}"></script>
@endpush

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ elixir('css/defaultLayout.css') }}"/>
@endpush

@section('content')
    @include('component.header')
    @yield('pageContent')
    @include('component.footer')
@endsection
