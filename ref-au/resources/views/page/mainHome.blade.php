@extends('defaultLayout')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ elixir('css/page/mainHome.css') }}"/>
@endpush

@section('pageContent')
    <div class="slice slice--fill-height slice--welcome">
        <div class="slice__content-container">
            <div class="club-identity">
                <div class="club-identity__logo">
                    REF
                </div>
                <div class="club-identity__subtitle">
                    Reformed Evangelical Fellowship
                </div>
            </div>
            <div class="about-snippet">
                <div class="about-snippet__quote">
                    &ldquo;Kami menyebut diri Reformed Injili, karena kami bertheologi Reformed dan bersemangat Injili.
                    Theologi Reformed, kami percaya adalah theologi &hellip;&rdquo;
                </div>
                <a href="#" class="about-snippet__button-link">About Us</a>
            </div>
        </div>
    </div>
@endsection
