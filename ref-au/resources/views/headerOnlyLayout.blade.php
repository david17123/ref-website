{{--
Layout of header-content
--}}

@extends('base')

@push('js')
    <script type="text/javascript" src="{{ elixir('js/headerOnlyLayout.js') }}"></script>
@endpush

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ elixir('css/headerOnlyLayout.css') }}"/>
@endpush

@section('content')
    @include('component.header')
    @yield('pageContent')
@endsection
