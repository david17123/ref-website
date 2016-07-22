{{--
Typical layout of header-content-footer
--}}

@extends('base')

@section('content')
    @include('component.header')
    @yield('pageContent')
    @include('component.footer')
@endsection
