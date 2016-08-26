@extends('defaultLayout')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ elixir('css/page/readSermonSummary.css') }}"/>
@endpush

@push('js')
    <script type="text/javascript" src="{{ elixir('js/page/readSermonSummary.js') }}"></script>
@endpush

@section('pageContent')
    <div class="page-content-container">
        <div class="sermon-summary-hero" style="background-image: url(http://www.w3schools.com/css/img_fjords.jpg)"></div>
        <div class="sermon-summary-layouter">
            <div class="sermon-summary-content">
                <h1 class="sermon-summary-content__title">{{ $sermonSummary->title }}</h1>
                <p class="sermon-summary-content__subtitle">Job 1:1-10</p>
                <div class="sermon-summary-content__text-container js-sermon-summary-text-container"></div>
                <div class="sermon-summary-content__footer">
                    <p class="sermon-summary-content__date-created">
                        {{ $sermonSummary->created_at->format('F j, Y') }}
                    </p>
                </div>
            </div>
            <div class="other-sermon-summaries-positioner">
                <div class="other-sermon-summaries">
                    <h1 class="other-sermon-summaries__heading">Articles</h1>
                    <div class="other-sermon-summaries__entry" style="background-image: url(http://www.w3schools.com/css/img_fjords.jpg)">
                        <div class="other-sermon-summaries__entry__positioner">
                            <h1 class="other-sermon-summaries__entry__title">Pokemon Go Culture</h1>
                            <span class="other-sermon-summaries__entry__read-button">Read</span>
                        </div>
                    </div>
                    <div class="other-sermon-summaries__entry" style="background-image: url(http://www.w3schools.com/css/img_fjords.jpg)">
                        <div class="other-sermon-summaries__entry__positioner">
                            <h1 class="other-sermon-summaries__entry__title">Pokemon Go Culture</h1>
                            <span class="other-sermon-summaries__entry__read-button">Read</span>
                        </div>
                    </div>
                    <div class="other-sermon-summaries__entry" style="background-image: url(http://www.w3schools.com/css/img_fjords.jpg)">
                        <div class="other-sermon-summaries__entry__positioner">
                            <h1 class="other-sermon-summaries__entry__title">Pokemon Go Culture</h1>
                            <span class="other-sermon-summaries__entry__read-button">Read</span>
                        </div>
                    </div>
                    <div class="other-sermon-summaries__entry" style="background-image: url(http://www.w3schools.com/css/img_fjords.jpg)">
                        <div class="other-sermon-summaries__entry__positioner">
                            <h1 class="other-sermon-summaries__entry__title">Pokemon Go Culture</h1>
                            <span class="other-sermon-summaries__entry__read-button">Read</span>
                        </div>
                    </div>
                    <div class="other-sermon-summaries__entry" style="background-image: url(http://www.w3schools.com/css/img_fjords.jpg)">
                        <div class="other-sermon-summaries__entry__positioner">
                            <h1 class="other-sermon-summaries__entry__title">Pokemon Go Culture</h1>
                            <span class="other-sermon-summaries__entry__read-button">Read</span>
                        </div>
                    </div>
                    <a href="#" class="other-sermon-summaries__view-more">
                        View More
                    </a>
                </div>
            </div>
        </div>
        <div class="prev-next-sermon-summaries">
            <div class="prev-next-sermon-summaries__entry" style="background-image: url(http://www.w3schools.com/css/img_fjords.jpg)">
                <div class="prev-next-sermon-summaries__entry__background">
                    <div class="background-image" style="background-image: url(http://www.w3schools.com/css/img_fjords.jpg)"></div>
                    <div class="background-gradient"></div>
                </div>
                <h1 class="prev-next-sermon-summaries__entry__title">God's sovereignty</h1>
                <p class="prev-next-sermon-summaries__entry__date-created">
                    July 12, 2016
                </p>
                <div class="prev-next-sermon-summaries__entry__chin-button">
                    <div class="chin-button__arrow chin-button__arrow--left"></div>
                    <span class="chin-button__text">Previous Week</span>
                </div>
            </div>{{--
        --}}<div class="prev-next-sermon-summaries__entry">
                <div class="prev-next-sermon-summaries__entry__background">
                    <div class="background-image" style="background-image: url(http://www.w3schools.com/css/img_fjords.jpg)"></div>
                    <div class="background-gradient"></div>
                </div>
                <h1 class="prev-next-sermon-summaries__entry__title">God's sovereignty</h1>
                <p class="prev-next-sermon-summaries__entry__date-created">
                    July 12, 2016
                </p>
                <div class="prev-next-sermon-summaries__entry__chin-button">
                    <span class="chin-button__text">Next Week</span>
                    <div class="chin-button__arrow chin-button__arrow--right"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
