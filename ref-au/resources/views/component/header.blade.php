<div class="site-header js-site-header">
    <div class="site-header__container">
        <div class="site-header__link">
            <a class="js-site-header-link" href="#">About US</a>
        </div>
        <div class="site-header__link">
            <a class="js-site-header-link" href="{{ route('articlesList', ['universityName' => $universityName]) }}">Article</a>
        </div>
        <div class="site-header__link">
            <a class="js-site-header-link" href="#">Event</a>
        </div>
        <div class="site-header__link">
            <a class="js-site-header-link" href="@if ($universityName) {{ route('uniHome', ['universityName' => $universityName]) }} @else {{ route('mainHome') }} @endif">
                <img class="site-header__site-logo" src="{{ $uniLogo or '/img/component/university/RMITLogo.png' }}" alt="Site logo" />
            </a>
        </div>
        <div class="site-header__link">
            <a class="js-site-header-link" href="{{ route('mainHome') }}/#universities">Universities</a>
        </div>
        <div class="site-header__link">
            <a class="js-site-header-link" href="{{ route('sermonSummariesList', ['universityName' => $universityName]) }}">Sermons</a>
        </div>
        <div class="site-header__link">
            <a class="js-site-header-link" href="#">Contact Us</a>
        </div>
    </div>
</div>
