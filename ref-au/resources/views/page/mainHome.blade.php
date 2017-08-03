@extends('headerOnlyLayout')

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
                    <img src="/img/page/mainHome/MissionIcon.png" alt="mission">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Nulla pretium blandit leo non luctus. Quisque ut leo erat.
                        Nullam convallis lectus non massa placerat tempus.
                        Etiam blandit rhoncus orci ac tincidunt.
                    </p>
                </div>
                <div class="mission-statement__entry">
                    <img src="/img/page/mainHome/VisionIcon.png" alt="vision">
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
            <form class="subscribe-form js-subscribe-form" method="POST">
                <input type="text" name="email" value="" placeholder="Your Email">
                <input type="submit" value="Sign Up">
            </form>
            <div class="subscribe-success js-subscribe-success">
                <i class="material-icons">&#xE86C;</i>
                <span class="text">Subscribed!</span>
            </div>
        </div>
    </div>

    <div class="slice slice--picquotes">
        <div class="slice__content-container">
            <div class="slice__header">
                Pic-quotes
            </div>
            <div class="picquotes-container js-picquotes-container">
                <div class="picquotes-set js-picquotes-set">
                    <div class="picquotes-column picquotes-column--large">
                        <div class="picquote picquote--large" style="background-image: url('{{ $picquotes[0]->image->getUrl() }}')"></div>
                        <div class="picquote" style="background-image: url('{{ $picquotes[1]->image->getUrl() }}')"></div>
                        <div class="picquote" style="background-image: url('{{ $picquotes[2]->image->getUrl() }}')"></div>
                    </div>
                    <div class="picquotes-column">
                        <div class="picquote" style="background-image: url('{{ $picquotes[3]->image->getUrl() }}')"></div>
                        <div class="picquote" style="background-image: url('{{ $picquotes[4]->image->getUrl() }}')"></div>
                        <div class="picquote" style="background-image: url('{{ $picquotes[5]->image->getUrl() }}')"></div>
                    </div>
                    <div class="picquotes-column picquotes-column--large">
                        <div class="picquote" style="background-image: url('{{ $picquotes[6]->image->getUrl() }}')"></div>
                        <div class="picquote" style="background-image: url('{{ $picquotes[7]->image->getUrl() }}')"></div>
                        <div class="picquote picquote--large" style="background-image: url('{{ $picquotes[8]->image->getUrl() }}')"></div>
                    </div>
                </div>
            </div>
            <a href="{{ route('picquotesList') }}" class="picquotes-link">
                <span class="text">More</span>
                <span class="arrow"></span>
            </a>
        </div>
    </div>

    <div class="slice slice--link-to-page">
        <div class="slice__content-container">
            <p class="slice__pre-header">Our</p>
            <p class="slice__header">Articles</p>
            <a class="button-link" href="{{ route('articlesList') }}">View</a>
        </div>
    </div>

    <div id="contact-us" class="slice slice--contact-us">
        <div class="slice__content-container">
            <div class="slice__header">We want to hear from you</div>
            <div class="contact-us">
                <div class="contact-us__details">
                    <div class="details__title">Contact</div>
                    <div class="details__block">
                        <p>552 City Road,</p>
                        <p>South Melbourne</p>
                        <p>3205, VIC</p>
                    </div>
                    <div class="details__block">
                        <p>Jordan Frans Adrian</p>
                        <p>+61 123 456 789</p>
                        <p>info@ref-au.org</p>
                    </div>
                    <div class="details__social-links">
                        <a class="social-link social-link--facebook" href="#">
                            <img class="social-link__icon" alt="Facebook" src="/img/component/footer/Facebook.png" />
                        </a>
                        <a class="social-link social-link--youtube" href="#">
                            <img class="social-link__icon" alt="Youtube" src="/img/component/footer/Youtube.png" />
                        </a>
                        <a class="social-link social-link--instagram" href="#">
                            <img class="social-link__icon" alt="Instagram" src="/img/component/footer/Instagram.png" />
                        </a>
                    </div>
                </div>
                <div class="contact-us__form-container">
                    <form class="contact-us__form js-contact-us-form" method="POST">
                        <input type="text" name="name" value="" placeholder="Name" required>
                        <input type="email" name="email" value="" placeholder="Email" required>
                        <input type="text" name="subject" value="" placeholder="Subject" required>
                        <textarea name="message" placeholder="Message" required></textarea>
                        <input type="submit" value="Send">
                    </form>
                    <div class="contact-us__contact-success js-contact-us-success">
                        <p>Thanks for contacting us!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
