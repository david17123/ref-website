<div class="site-header js-site-header">
    <div class="site-header__container">
        <div class="site-header__link">
            <a class="js-site-header-link" href="#">About US</a>
        </div>
        <div class="site-header__link">
            <a class="js-site-header-link" href="{{ $uniUrl ? route('articlesListUni', ['uniUrl' => $uniUrl]) : route('articlesList') }}">Article</a>
        </div>
        <div class="site-header__link">
            <a class="js-site-header-link" href="#">Event</a>
        </div>
        <div class="site-header__link">
            <a class="js-site-header-link" href="{{ $uniUrl ? route('uniHome', ['uniUrl' => $uniUrl]) : route('mainHome') }}">
                <img class="site-header__site-logo" src="{{ $uniLogo or '/img/component/university/RMITLogoWhite.png' }}" alt="Site logo" />
            </a>
        </div>
        <div class="site-header__link">
            <a class="js-site-header-link" href="{{ route('mainHome') }}/#universities">Universities</a>
        </div>
        <div class="site-header__link">
            <a class="js-site-header-link" href="{{ route('sermonSummariesList', ['uniUrl' => $uniUrl]) }}">Sermons</a>
        </div>
        <div class="site-header__link">
            <a class="js-site-header-link" href="{{ route('mainHome') }}/#contact-us">Contact Us</a>
        </div>
    </div>
</div>
