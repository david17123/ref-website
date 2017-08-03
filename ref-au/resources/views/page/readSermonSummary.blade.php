@extends('defaultLayout')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ elixir('css/page/readSermonSummary.css') }}"/>
@endpush

@push('js')
    <script type="text/javascript" src="{{ elixir('js/page/readSermonSummary.js') }}"></script>
@endpush

@section('pageContent')
    <div class="page-content-container">
        <div class="sermon-summary-hero" style="background-image: url('{{ is_null($sermonSummary->heroImage) ? '' : $sermonSummary->heroImage->getUrl() }}')"></div>
        <div class="sermon-summary-layouter">
            <div class="sermon-summary-content">
                <h1 class="sermon-summary-content__title">{{ $sermonSummary->title }}</h1>
                <p class="sermon-summary-content__subtitle">
                    @if ($sermonSummary->subtitle)
                        {{ $sermonSummary->subtitle }}
                    @endif
                </p>
                <div class="sermon-summary-content__text-container js-sermon-summary-text-container"></div>
                <div class="sermon-summary-content__footer">
                    <p class="sermon-summary-content__date-created">
                        {{ $sermonSummary->created_at->format('F j, Y') }}
                    </p>
                </div>
            </div>
            <div class="articles-positioner">
                <div class="articles">
                    <h1 class="articles__heading">Articles</h1>
                    @foreach ($articles as $article)
                        <div class="articles__entry">
                            <a href="{{ $uniUrl ? route('readArticleUni', ['uniUrl' => $uniUrl, 'article' => $article->id]) : route('readArticle', ['article' => $article->id]) }}" class="articles__entry__link-overlay"></a>
                            <div class="articles__entry__background">
                                <div class="background-image" style="background-image: url({{ is_null($article->heroImage) ? '' : $article->heroImage->getUrl() }})"></div>
                                <div class="background-shadow"></div>
                            </div>
                            <div class="articles__entry__positioner">
                                <h1 class="articles__entry__title">{{ $article->title }}</h1>
                                <span class="articles__entry__read-button">Read</span>
                            </div>
                        </div>
                    @endforeach
                    <a href="{{ $uniUrl ? route('articlesListUni', ['uniUrl' => $uniUrl]) : route('articlesList') }}" class="articles__view-more">
                        View More
                    </a>
                </div>
            </div>
        </div>
        <div class="prev-next-sermon-summaries">
            <div class="prev-next-sermon-summaries__entry">
                <a href="{{ route('readSermonSummary', ['uniUrl' => $uniUrl, 'sermonSummary' => $prevSermon->id]) }}" class="prev-next-sermon-summaries__entry__link-overlay"></a>
                <div class="prev-next-sermon-summaries__entry__background">
                    <div class="background-image" style="background-image: url({{ is_null($prevSermon->heroImage) ? '' : $prevSermon->heroImage->getUrl() }})"></div>
                    <div class="background-shadow"></div>
                </div>
                <h1 class="prev-next-sermon-summaries__entry__title">{{ $prevSermon->title }}</h1>
                <p class="prev-next-sermon-summaries__entry__date-created">
                    {{ $prevSermon->created_at->format('F j, Y') }}
                </p>
                <div class="prev-next-sermon-summaries__entry__chin-button">
                    <div class="chin-button__arrow chin-button__arrow--left"></div>
                    <span class="chin-button__text">Previous Week</span>
                </div>
            </div>{{--
        --}}<div class="prev-next-sermon-summaries__entry">
                <a href="{{ route('readSermonSummary', ['uniUrl' => $uniUrl, 'sermonSummary' => $nextSermon->id]) }}" class="prev-next-sermon-summaries__entry__link-overlay"></a>
                <div class="prev-next-sermon-summaries__entry__background">
                    <div class="background-image" style="background-image: url({{ is_null($nextSermon->heroImage) ? '' : $nextSermon->heroImage->getUrl() }})"></div>
                    <div class="background-shadow"></div>
                </div>
                <h1 class="prev-next-sermon-summaries__entry__title">{{ $nextSermon->title }}</h1>
                <p class="prev-next-sermon-summaries__entry__date-created">
                    {{ $nextSermon->created_at->format('F j, Y') }}
                </p>
                <div class="prev-next-sermon-summaries__entry__chin-button">
                    <span class="chin-button__text">Next Week</span>
                    <div class="chin-button__arrow chin-button__arrow--right"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
