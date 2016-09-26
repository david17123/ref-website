@extends('adminLayout')

@push('css')
    {{-- <link rel="stylesheet" type="text/css" href="{{ elixir('css/page/admin.home.css') }}"/> --}}
@endpush

@push('js')
    {{-- <script type="text/javascript" src="{{ elixir('js/page/admin/home.js') }}"></script> --}}
@endpush

@section('pageContent')
    <div class="page-content-container">
        You are in admin realm. This should be the dashboard for admins.
    </div>
@endsection
