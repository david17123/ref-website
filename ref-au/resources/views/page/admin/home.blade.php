@extends('adminLayout')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ elixir('css/page/admin/home.css') }}"/>
@endpush

@push('js')
    {{-- <script type="text/javascript" src="{{ elixir('js/page/admin/home.js') }}"></script> --}}
@endpush

@section('pageContent')
    <div class="page-content-container">
        <h1 class="section-header">Manage university sites</h1>
        <div class="manage-unis">
            @foreach($universities as $university)
                <a class="uni" href="{{ route('manageUniSite', ['uniUrl' => $university->subdomain]) }}">
                    <div class="uni__column">
                        <img class="uni__logo" src="" />
                    </div>
                    <div class="uni__column">
                        <p class="uni__name">
                            {{ $university->name }}
                        </p>
                        <p class="uni__url">
                            {{ route('uniHome', ['uniUrl' => $university->subdomain]) }}
                        </p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
