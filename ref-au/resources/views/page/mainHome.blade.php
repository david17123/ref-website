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
                <div class="club-identity__logo" style="background-image: url(img/page/mainHome/REFLogo.png)"></div>
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

    <div id="universities" class="slice slice--university slice--melbourne-uni">
        <div class="slice__content-container">
            <div class="university university--details-at-left">
                <div class="university__details">
                    <p>John Medley Building Room 114<br>Tuesday, 12.30 PM</p>
                    <p>+61 405 059 466</p>
                    <a href="{{ route('uniHome', ['univeristyName' => 'unimelb']) }}" class="university__details__visit-button">
                        <span class="text">Visit</span>
                        <span class="arrow"></span>
                    </a>
                </div>
                <div class="university__photos">
                    <div class="university__photos__carousel js-photos-carousel">
                        <div class="university__photos__container">
                            <img src="/img/page/mainHome/Uni1.jpg" alt="Picture 1" />
                        </div>
                        <div class="university__photos__container">
                            <img src="/img/page/mainHome/Uni2.jpg" alt="Picture 2" />
                        </div>
                        <div class="university__photos__container">
                            <img src="/img/page/mainHome/Uni3.jpg" alt="Picture 3" />
                        </div>
                    </div>
                </div>
                <div class="university__logo-placeholder"></div>
            </div>
            <div class="slice-cover slice-cover--open-right js-slice-cover-toggle" data-target="slice--melbourne-uni">
                <div class="slice-cover__content-container">
                    <img class="slice-cover__image" src="/img/component/university/MelbourneUniLogo.png" alt="Melbourne University Logo" />
                    <p class="slice-cover__text">University of<br>Melbourne</p>
                </div>
            </div>
        </div>
    </div>
    <div class="slice slice--university slice--monash-uni">
        <div class="slice__content-container">
            <div class="university university--details-at-right">
                <div class="university__logo-placeholder"></div>
                <div class="university__photos">
                    <div class="university__photos__carousel js-photos-carousel">
                        <div class="university__photos__container">
                            <img src="/img/page/mainHome/Uni1.jpg" alt="Picture 1" />
                        </div>
                        <div class="university__photos__container">
                            <img src="/img/page/mainHome/Uni2.jpg" alt="Picture 2" />
                        </div>
                        <div class="university__photos__container">
                            <img src="/img/page/mainHome/Uni3.jpg" alt="Picture 3" />
                        </div>
                    </div>
                </div>
                <div class="university__details">
                    <p>Building 46 Room 10<br>Tuesday, 12.30 PM</p>
                    <p>+61 405 059 466</p>
                    <a href="{{ route('uniHome', ['univeristyName' => 'monash']) }}" class="university__details__visit-button">
                        <span class="text">Visit</span>
                        <span class="arrow"></span>
                    </a>
                </div>
            </div>
            <div class="slice-cover slice-cover--open-left js-slice-cover-toggle" data-target="slice--monash-uni">
                <div class="slice-cover__content-container">
                    <img class="slice-cover__image" src="/img/component/university/MonashLogo.png" alt="Monash University Logo" />
                    <p class="slice-cover__text">Monash<br>University</p>
                </div>
            </div>
        </div>
    </div>
    <div class="slice slice--university slice--rmit-uni">
        <div class="slice__content-container">
            <div class="university university--details-at-left">
                <div class="university__details">
                    <p>Building 46 Room 10<br>Tuesday, 12.30 PM</p>
                    <p>+61 405 059 466</p>
                    <a href="{{ route('uniHome', ['univeristyName' => 'rmit']) }}" class="university__details__visit-button">
                        <span class="text">Visit</span>
                        <span class="arrow"></span>
                    </a>
                </div>
                <div class="university__photos">
                    <div class="university__photos__carousel js-photos-carousel">
                        <div class="university__photos__container">
                            <img src="/img/page/mainHome/Uni1.jpg" alt="Picture 1" />
                        </div>
                        <div class="university__photos__container">
                            <img src="/img/page/mainHome/Uni2.jpg" alt="Picture 2" />
                        </div>
                        <div class="university__photos__container">
                            <img src="/img/page/mainHome/Uni3.jpg" alt="Picture 3" />
                        </div>
                    </div>
                </div>
                <div class="university__logo-placeholder"></div>
            </div>
            <div class="slice-cover slice-cover--open-right js-slice-cover-toggle" data-target="slice--rmit-uni">
                <div class="slice-cover__content-container">
                    <img class="slice-cover__image" src="/img/component/university/RMITLogo.png" alt="RMIT University Logo" />
                    <p class="slice-cover__text">RMIT<br>University</p>
                </div>
            </div>
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
