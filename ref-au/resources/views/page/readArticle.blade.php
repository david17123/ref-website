@extends('defaultLayout')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ elixir('css/page/readArticle.css') }}"/>
@endpush

@push('js')
    <script type="text/javascript" src="{{ elixir('js/page/readArticle.js') }}"></script>
@endpush

@section('pageContent')
    <div class="page-content-container">
        <div class="article-hero" style="background-image: url(http://www.w3schools.com/css/img_fjords.jpg)"></div>
        <div class="article-layouter">
            <div class="article-content">
                <h1 class="article-content__title">{{ $article->title }}</h1>
                <p class="article-content__subtitle">
                    @if ($article->subtitle)
                        {{ $article->subtitle }}
                    @endif
                </p>
                <div class="article-content__text-container js-article-text-container"></div>
                <div class="article-content__footer">
                    <p class="article-content__date-created">
                        {{ $article->created_at->format('F j, Y') }}
                    </p>
                </div>
            </div>
            <div class="other-articles-positioner">
                <div class="other-articles">
                    <h1 class="other-articles__heading">Articles</h1>
                    <div class="other-articles__entry">
                        <div class="other-articles__entry__background">
                            <div class="background-image" style="background-image: url(http://www.w3schools.com/css/img_fjords.jpg)"></div>
                            <div class="background-shadow"></div>
                        </div>
                        <div class="other-articles__entry__positioner">
                            <h1 class="other-articles__entry__title">Pokemon Go Culture</h1>
                            <span class="other-articles__entry__read-button">Read</span>
                        </div>
                    </div>
                    <div class="other-articles__entry">
                        <div class="other-articles__entry__background">
                            <div class="background-image" style="background-image: url(http://www.w3schools.com/css/img_fjords.jpg)"></div>
                            <div class="background-shadow"></div>
                        </div>
                        <div class="other-articles__entry__positioner">
                            <h1 class="other-articles__entry__title">Pokemon Go Culture</h1>
                            <span class="other-articles__entry__read-button">Read</span>
                        </div>
                    </div>
                    <div class="other-articles__entry">
                        <div class="other-articles__entry__background">
                            <div class="background-image" style="background-image: url(http://www.w3schools.com/css/img_fjords.jpg)"></div>
                            <div class="background-shadow"></div>
                        </div>
                        <div class="other-articles__entry__positioner">
                            <h1 class="other-articles__entry__title">Pokemon Go Culture</h1>
                            <span class="other-articles__entry__read-button">Read</span>
                        </div>
                    </div>
                    <div class="other-articles__entry">
                        <div class="other-articles__entry__background">
                            <div class="background-image" style="background-image: url(http://www.w3schools.com/css/img_fjords.jpg)"></div>
                            <div class="background-shadow"></div>
                        </div>
                        <div class="other-articles__entry__positioner">
                            <h1 class="other-articles__entry__title">Pokemon Go Culture</h1>
                            <span class="other-articles__entry__read-button">Read</span>
                        </div>
                    </div>
                    <div class="other-articles__entry">
                        <div class="other-articles__entry__background">
                            <div class="background-image" style="background-image: url(http://www.w3schools.com/css/img_fjords.jpg)"></div>
                            <div class="background-shadow"></div>
                        </div>
                        <div class="other-articles__entry__positioner">
                            <h1 class="other-articles__entry__title">Pokemon Go Culture</h1>
                            <span class="other-articles__entry__read-button">Read</span>
                        </div>
                    </div>
                    <a href="#" class="other-articles__view-more">
                        View More
                    </a>
                </div>
            </div>
        </div>
        <div class="prev-next-articles">
            <div class="prev-next-articles__entry" style="background-image: url(http://www.w3schools.com/css/img_fjords.jpg)">
                <div class="prev-next-articles__entry__background">
                    <div class="background-image" style="background-image: url(http://www.w3schools.com/css/img_fjords.jpg)"></div>
                    <div class="background-gradient"></div>
                </div>
                <h1 class="prev-next-articles__entry__title">God's sovereignty</h1>
                <p class="prev-next-articles__entry__date-created">
                    July 12, 2016
                </p>
                <div class="prev-next-articles__entry__chin-button">
                    <div class="chin-button__arrow chin-button__arrow--left"></div>
                    <span class="chin-button__text">Previous Week</span>
                </div>
            </div>{{--
        --}}<div class="prev-next-articles__entry">
                <div class="prev-next-articles__entry__background">
                    <div class="background-image" style="background-image: url(http://www.w3schools.com/css/img_fjords.jpg)"></div>
                    <div class="background-gradient"></div>
                </div>
                <h1 class="prev-next-articles__entry__title">God's sovereignty</h1>
                <p class="prev-next-articles__entry__date-created">
                    July 12, 2016
                </p>
                <div class="prev-next-articles__entry__chin-button">
                    <span class="chin-button__text">Next Week</span>
                    <div class="chin-button__arrow chin-button__arrow--right"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
