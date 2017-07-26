@extends('defaultLayout')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ elixir('css/page/mainHome.css') }}"/>
@endpush

@push('js')
    <script type="text/javascript" src="{{ elixir('js/page/mainHome.js') }}"></script>
@endpush

@section('pageContent')
    <div class="slice slice--welcome">
        <div class="slice__background">
            <div class="slice__background-gradient"></div>
        </div>
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
                <a href="#" class="about-snippet__button-link">
                    <span class="text">About Us</span>
                    <span class="arrow"></span>
                </a>
            </div>
        </div>
    </div>

    <div class="slice slice--mission-statement">
        <div class="slice__content-container">
            <div class="slice__header">
                <p class="slice__header__pre-header">Our</p>
                <p class="slice__header__header">Mission</p>
            </div>
            <div class="mission-statement">
                <div class="mission-statement__entry">
                    <img src="/img/component/university/MelbourneUniLogo.png" alt="vision">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Nulla pretium blandit leo non luctus. Quisque ut leo erat.
                        Nullam convallis lectus non massa placerat tempus.
                        Etiam blandit rhoncus orci ac tincidunt.
                    </p>
                </div>
                <div class="mission-statement__entry">
                    <img src="/img/component/university/MelbourneUniLogo.png" alt="mission">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Nulla pretium blandit leo non luctus. Quisque ut leo erat.
                        Nullam convallis lectus non massa placerat tempus.
                        Etiam blandit rhoncus orci ac tincidunt.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div id="universities" class="slice slice--university-slices-header">
        <div class="slice__content-container">
            <div class="university-slices-header">
                Weekly Meetings
            </div>
        </div>
    </div>
    @for ($i=0; $i<count($universities); $i++)
        <div class="slice slice--university slice--{{ $universities[$i]->subdomain }}">
            <div class="slice__content-container">
                <div class="university university--details-at-{{ $i % 2 === 1 ? 'right' : 'left' }}">
                    @if ($i % 2 === 1)
                        <div class="university__logo-placeholder"></div>
                    @else
                        <div class="university__details">
                            <p>{{ $universities[$i]->meeting_place }}<br>{{ $universities[$i]->meeting_time }}</p>
                            <p>{{ $universities[$i]->contact_person }}</p>
                            <a href="{{ route('uniHome', ['univeristyName' => $universities[$i]->subdomain]) }}" class="university__details__visit-button">
                                <span class="text">Visit</span>
                                <span class="arrow"></span>
                            </a>
                        </div>
                    @endif
                    <div class="university__photos">
                        <div class="university__photos__carousel js-photos-carousel">
                            @foreach ($universities[$i]->clubPicturesAssetGroup->assets as $clubPicture)
                                <div class="university__photos__container" style="background-image: url('{{ $clubPicture->getUrl() }}')"></div>
                            @endforeach
                        </div>
                    </div>
                    @if ($i % 2 === 1)
                        <div class="university__details">
                            <p>{{ $universities[$i]->meeting_place }}<br>{{ $universities[$i]->meeting_time }}</p>
                            <p>{{ $universities[$i]->contact_person }}</p>
                            <a href="{{ route('uniHome', ['univeristyName' => $universities[$i]->subdomain]) }}" class="university__details__visit-button">
                                <span class="text">Visit</span>
                                <span class="arrow"></span>
                            </a>
                        </div>
                    @else
                        <div class="university__logo-placeholder"></div>
                    @endif
                </div>
                <div class="slice-cover slice-cover--open-{{ $i % 2 === 1 ? 'left' : 'right' }} js-slice-cover-toggle" data-target="slice--{{ $universities[$i]->subdomain }}">
                    <div class="slice-cover__content-container">
                        <img class="slice-cover__image" src="{{ $universities[$i]->logo->getUrl() }}" alt="{{ $universities[$i]->name }} Logo" />
                        <p class="slice-cover__text">{{ $universities[$i]->name }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endfor

    <div class="slice slice--subscribe">
        <div class="slice__content-container">
            <div class="slice__header">
                Join Us!
            </div>
            <p class="subscribe-prompt subscribe-prompt--prominent">
                We'd like to keep you in touch with our events and content.
            </p>
            <p class="subscribe-prompt">
                Sign up now to our mailing list to receive updates and devotions right in your inbox!
            </p>
            <div class="subscribe-form js-subscribe-form">
                <input type="text" name="email" value="" placeholder="Your Email">
                <input type="submit" value="Sign Up">
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
