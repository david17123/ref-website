<!--
@foreach ($articles as $i=>$article)
--><div class="article-list-entry @if ($i === 0) article-list-entry--highlight @endif ">
        <a href="{{ $uniUrl ? route('readArticleUni', ['uniUrl' => $uniUrl, 'article' => $article->id]) : route('readArticle', ['article' => $article->id]) }}" class="article-list-entry__link-overlay"></a>
        @if ($i === 0)
            <div class="article-list-entry__flag">
                Recent
            </div>
        @endif
        <div class="article-list-entry__hero" style="background-image: url('{{ is_null($article->heroImage) ? '' : $article->heroImage->getUrl() }}')"></div>{{--
    --}}<div class="article-list-entry__snippet-content">
            <h1 class="article-list-entry__title">
                {{ $article->title }}
            </h1>
            <p class="article-list-entry__subtitle">
                @if ($article->subtitle)
                    {{ $article->subtitle }}
                @endif
            </p>
            <p class="article-list-entry__snippet">
                {{-- Idea from: http://stackoverflow.com/a/79986 --}}
                @if ( strlen($article->content) > 300 )
                    {{ substr($article->content, 0, strpos(wordwrap($article->content, 300, '#delim#'), '#delim#')) }}&hellip;
                @else
                    {{ $article->content }}
                @endif
            </p>
            <p class="article-list-entry__read-more">
                <span class="article-list-entry__read-more__text">Read more&hellip;</span>
            </p>
            <div class="article-list-entry__footer">
                <p class="article-list-entry__date-created">
                    {{ $article->created_at->format('F j, Y') }}
                </p>
            </div>
        </div>
    </div><!--
@endforeach
-->
