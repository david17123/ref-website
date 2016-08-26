<!--
@foreach ($articles as $i=>$article)
--><div class="article-list-entry js-article-entry @if ($i === 0) article-list-entry--highlight @endif "
         data-url="{{ route('readArticle', ['universityName' => 'rmit', 'article' => $article->id]) }}">
        @if ($i === 0)
            <div class="article-list-entry__flag">
                Recent
            </div>
        @endif
        <div class="article-list-entry__hero" style="background-image: url(http://www.w3schools.com/css/img_fjords.jpg)"></div>{{--
    --}}<div class="article-list-entry__snippet-content">
            <h1 class="article-list-entry__title">
                {{ $article->title }}
            </h1>

            <p class="article-list-entry__subtitle">
                Job 1:1-10
            </p>
            <p class="article-list-entry__snippet">
                {{-- Idea from: http://stackoverflow.com/a/79986 --}}
                {{ substr($article->content, 0, strpos(wordwrap($article->content, 300, '#delim#'), '#delim#')) }}&hellip;
            </p>
            <p class="article-list-entry__read-more">
                <a href="{{ route('readArticle', ['universityName' => 'rmit', 'article' => $article->id]) }}" class="article-list-entry__read-more__link">Read more&hellip;</a>
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









<div class="article-list-entry article-list-entry--highlight">
    <div class="article-list-entry__flag">
        This week
    </div>
    <div class="article-list-entry__hero" style="background-image: url(http://www.w3schools.com/css/img_fjords.jpg)"></div>{{--
--}}<div class="article-list-entry__snippet-content">
        <h1 class="article-list-entry__title">
            How does God Answer Job?
        </h1>
        <p class="article-list-entry__subtitle">
            Job 1:1-10
        </p>
        <p class="article-list-entry__snippet">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries
        </p>
        <p class="article-list-entry__read-more">
            <a href="{{ route('readArticle', ['universityName' => 'rmit', 'article' => 1]) }}" class="article-list-entry__read-more__link">Read more&hellip;</a>
        </p>
        <div class="article-list-entry__footer">
            <p class="article-list-entry__date-created">
                March 12, 2016
            </p>
        </div>
    </div>
</div><!--





--><div class="article-list-entry">
    <div class="article-list-entry__hero" style="background-image: url(http://www.w3schools.com/css/img_fjords.jpg)"></div>
    <div class="article-list-entry__snippet-content">
        <h1 class="article-list-entry__title">
            How does God Answer Job?
        </h1>
        <p class="article-list-entry__subtitle">
            Job 1:1-10
        </p>
        <p class="article-list-entry__snippet">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries
        </p>
        <p class="article-list-entry__read-more">
            <a href="{{ route('readArticle', ['universityName' => 'rmit', 'article' => 1]) }}" class="article-list-entry__read-more__link">Read more&hellip;</a>
        </p>
        <div class="article-list-entry__footer">
            <p class="article-list-entry__date-created">
                March 12, 2016
            </p>
        </div>
    </div>
</div><!--
--><div class="article-list-entry">
    <div class="article-list-entry__hero" style="background-image: url(http://www.w3schools.com/css/img_fjords.jpg)"></div>
    <div class="article-list-entry__snippet-content">
        <h1 class="article-list-entry__title">
            How does God Answer Job?
        </h1>
        <p class="article-list-entry__subtitle">
            Job 1:1-10
        </p>
        <p class="article-list-entry__snippet">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries
        </p>
        <p class="article-list-entry__read-more">
            <a href="{{ route('readArticle', ['universityName' => 'rmit', 'article' => 1]) }}" class="article-list-entry__read-more__link">Read more&hellip;</a>
        </p>
        <div class="article-list-entry__footer">
            <p class="article-list-entry__date-created">
                March 12, 2016
            </p>
        </div>
    </div>
</div><!--
--><div class="article-list-entry">
    <div class="article-list-entry__hero" style="background-image: url(http://www.w3schools.com/css/img_fjords.jpg)"></div>
    <div class="article-list-entry__snippet-content">
        <h1 class="article-list-entry__title">
            How does God Answer Job?
        </h1>
        <p class="article-list-entry__subtitle">
            Job 1:1-10
        </p>
        <p class="article-list-entry__snippet">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries
        </p>
        <p class="article-list-entry__read-more">
            <a href="{{ route('readArticle', ['universityName' => 'rmit', 'article' => 1]) }}" class="article-list-entry__read-more__link">Read more&hellip;</a>
        </p>
        <div class="article-list-entry__footer">
            <p class="article-list-entry__date-created">
                March 12, 2016
            </p>
        </div>
    </div>
</div><!--
--><div class="article-list-entry">
    <div class="article-list-entry__hero" style="background-image: url(http://www.w3schools.com/css/img_fjords.jpg)"></div>
    <div class="article-list-entry__snippet-content">
        <h1 class="article-list-entry__title">
            How does God Answer Job?
        </h1>
        <p class="article-list-entry__subtitle">
            Job 1:1-10
        </p>
        <p class="article-list-entry__snippet">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries
        </p>
        <p class="article-list-entry__read-more">
            <a href="{{ route('readArticle', ['universityName' => 'rmit', 'article' => 1]) }}" class="article-list-entry__read-more__link">Read more&hellip;</a>
        </p>
        <div class="article-list-entry__footer">
            <p class="article-list-entry__date-created">
                March 12, 2016
            </p>
        </div>
    </div>
</div><!--
--><div class="article-list-entry">
    <div class="article-list-entry__hero" style="background-image: url(http://www.w3schools.com/css/img_fjords.jpg)"></div>
    <div class="article-list-entry__snippet-content">
        <h1 class="article-list-entry__title">
            How does God Answer Job?
        </h1>
        <p class="article-list-entry__subtitle">
            Job 1:1-10
        </p>
        <p class="article-list-entry__snippet">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries
        </p>
        <p class="article-list-entry__read-more">
            <a href="{{ route('readArticle', ['universityName' => 'rmit', 'article' => 1]) }}" class="article-list-entry__read-more__link">Read more&hellip;</a>
        </p>
        <div class="article-list-entry__footer">
            <p class="article-list-entry__date-created">
                March 12, 2016
            </p>
        </div>
    </div>
</div><!--
--><div class="article-list-entry">
    <div class="article-list-entry__hero" style="background-image: url(http://www.w3schools.com/css/img_fjords.jpg)"></div>
    <div class="article-list-entry__snippet-content">
        <h1 class="article-list-entry__title">
            How does God Answer Job?
        </h1>
        <p class="article-list-entry__subtitle">
            Job 1:1-10
        </p>
        <p class="article-list-entry__snippet">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries
        </p>
        <p class="article-list-entry__read-more">
            <a href="{{ route('readArticle', ['universityName' => 'rmit', 'article' => 1]) }}" class="article-list-entry__read-more__link">Read more&hellip;</a>
        </p>
        <div class="article-list-entry__footer">
            <p class="article-list-entry__date-created">
                March 12, 2016
            </p>
        </div>
    </div>
</div>
