@extends('defaultLayout')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ elixir('css/page/mainHome.css') }}"/>
@endpush

@push('js')
    <script type="text/javascript" src="{{ elixir('js/page/mainHome.js') }}"></script>
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
                <p class="about-snippet__quote">
                    &ldquo;Kami menyebut diri Reformed Injili, karena kami bertheologi Reformed dan bersemangat Injili.
                    Theologi Reformed, kami percaya adalah theologi &hellip;&rdquo;
                </p>
                <a href="#" class="about-snippet__button-link">About Us</a>
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

    <div class="slice slice--university slice--melbourne-uni">
        <div class="slice__content-container">
            <div class="test-slick">
              <div class="slide-entry">Lorem ipsum</div>
              <div class="slide-entry">dolow sit amet</div>
              <div class="slide-entry">adipiscing elit</div>
            </div>
        </div>
    </div>
    <div class="slice slice--university slice--monash-uni">
        <div class="slice__content-container">
        </div>
    </div>
    <div class="slice slice--university slice--rmit-uni">
        <div class="slice__content-container">
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
@endsection
