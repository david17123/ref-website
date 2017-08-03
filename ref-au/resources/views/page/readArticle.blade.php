@extends('defaultLayout')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ elixir('css/page/readArticle.css') }}"/>
@endpush

@push('js')
    <script type="text/javascript" src="{{ elixir('js/page/readArticle.js') }}"></script>
@endpush

@section('pageContent')
    <div class="page-content-container">
        <div class="article-hero" style="background-image: url('{{ is_null($article->heroImage) ? '' : $article->heroImage->getUrl() }}')"></div>
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
                    @foreach ($otherArticles as $otherArticle)
                        <div class="other-articles__entry">
                            <a href="{{ $uniUrl ? route('readArticleUni', ['uniUrl' => $uniUrl, 'article' => $otherArticle->id]) : route('readArticle', ['article' => $otherArticle->id]) }}" class="other-articles__entry__link-overlay"></a>
                            <div class="other-articles__entry__background">
                                <div class="background-image" style="background-image: url({{ is_null($otherArticle->heroImage) ? '' : $otherArticle->heroImage->getUrl() }})"></div>
                                <div class="background-shadow"></div>
                            </div>
                            <div class="other-articles__entry__positioner">
                                <h1 class="other-articles__entry__title">{{ $otherArticle->title }}</h1>
                                <span class="other-articles__entry__read-button">Read</span>
                            </div>
                        </div>
                    @endforeach
                    <a href="{{ $uniUrl ? route('articlesListUni', ['uniUrl' => $uniUrl]) : route('articlesList') }}" class="other-articles__view-more">
                        View More
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
