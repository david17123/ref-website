@extends('adminLayout')

@push('js')
    <script type="text/javascript" src="{{ elixir('js/page/admin/home.js') }}"></script>
@endpush

@section('pageContent')
    <div class="page-content-container">
        <h1 class="section-header">Manage university sites</h1>
        <div class="manage-unis">
            @foreach($universities as $university)
                <a class="uni" href="{{ route('manageUniSite', ['uniUrl' => $university->subdomain]) }}">
                    <div class="uni__column uni__column--logo">
                        @if ($university->logo)
                            <div class="uni__logo" style="background-image: url({{ $university->logo->getUrl() }})"></div>
                        @else
                            <i class="material-icons uni__logo">&#xE80C;</i>
                        @endif
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
            <a class="uni uni--create-button" href="#">
                <form class="uni__hidden-create-form js-create-form" action="{{ route('createUni') }}" method="post">
                    {{ csrf_field() }}
                </form>
                <div class="uni__column uni__column--logo">
                    <i class="material-icons uni__logo">&#xE145;</i>
                </div>
                <div class="uni__column">
                    <p class="uni__name">
                        Add university
                    </p>
                </div>
            </a>
        </div>
    </div>
@endsection
