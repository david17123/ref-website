@extends('base')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ elixir('css/page/admin/admin.css') }}"/>
@endpush

{{-- @push('js')
    <script type="text/javascript" src="{{ elixir('js/adminLayout.js') }}"></script>
@endpush --}}

@section('content')
    @include('component.admin.header')
    @yield('pageContent')
@endsection
