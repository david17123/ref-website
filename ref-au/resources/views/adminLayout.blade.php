@extends('base')

{{-- @push('js')
    <script type="text/javascript" src="{{ elixir('js/adminLayout.js') }}"></script>
@endpush

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ elixir('css/adminLayout.css') }}"/>
@endpush --}}

@section('content')
    @yield('pageContent')
@endsection
