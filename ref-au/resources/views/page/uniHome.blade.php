@extends('defaultLayout')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ elixir('css/page/uniHome.css') }}"/>
@endpush

@push('js')
    <script type="text/javascript" src="{{ elixir('js/page/uniHome.js') }}"></script>
@endpush

@section('pageContent')
    <div class="slice slice--fill-height slice--welcome">
        <div class="slice__content-container">
            <div class="posters-carousel js-posters-carousel">
                <div class="posters-carousel__entry" style="background-image: url(/img/page/uniHome/TenCommandmentsPoster.jpg)"></div>
                <div class="posters-carousel__entry" style="background-image: url(/img/page/uniHome/FirstQuoteBackground.jpg)"></div>
                <div class="posters-carousel__entry" style="background-image: url(/img/page/uniHome/SecondQuoteBackground.jpg)"></div>
            </div>
        </div>
    </div>

    <div class="slice slice--quote slice--first-quote">
        <div class="slice__content-container">
            <div class="quote">
                <p class="quote__author">
                    Kejadian 1:28
                </p>
                <p class="quote__content">
                    &ldquo;Allah memberkati mereka, lalu Allah berfirman kepada mereka: &lsquo;Beranakcuculah dan bertambah banyak;
                    penuhilah bumi dan taklukkanlah itu, berkuasalah atas ikan-ikan di laut dan burung-burung di udara dan
                    atas segala binatang yang merayap di bumi.&rsquo;&rdquo;
                </p>
            </div>
        </div>
    </div>

    <div class="slice slice--link-to-page">
        <div class="slice__content-container">
            <p class="pre-header">Our</p>
            <p class="header">Weekly Sermon</p>
            <a class="button-link" href="#">Read</a>
        </div>
    </div>

    <div class="slice slice--quote slice--second-quote">
        <div class="slice__content-container">
            <div class="quote quote--light">
                <p class="quote__content">
                    &ldquo;This Christianity is not a cultural thing. It is not something tha should be just a
                    small part of your life; it is not something that you do on Sunday&hellip; Christianity is
                    not about you being just like the world all the time and then coming to church on Sunday.
                    If that is your Christianity &hellip; you are not Christian.&rdquo;
                </p>
                <p class="quote__author">
                    Paul Washer
                </p>
            </div>
        </div>
    </div>

    <div class="slice slice--link-to-page">
        <div class="slice__content-container">
            <p class="pre-header">Our</p>
            <p class="header">Articles</p>
            <a class="button-link" href="#">Read</a>
        </div>
    </div>

    <div class="slice slice--other-universities">
        <div class="slice__content-container">
            <a class="button-link" href="{{ env('APP_URL') }}/#universities">Other Universities &gt;</a>
        </div>
    </div>
@endsection
