<!--
@foreach ($sermonSummaries as $i=>$sermonSummary)
--><div class="sermon-summary-list-entry @if ($i === 0) sermon-summary-list-entry--highlight @endif ">
        <a href="{{ route('readSermonSummary', ['universityName' => $universityName, 'sermonSummary' => $sermonSummary->id]) }}" class="sermon-summary-list-entry__link-overlay"></a>
        @if ($i === 0)
            <div class="sermon-summary-list-entry__flag">
                Recent
            </div>
        @endif
        <div class="sermon-summary-list-entry__hero" style="background-image: url({{ is_null($sermonSummary->heroImage) ? '' : $sermonSummary->heroImage->getURL() }})"></div>{{--
    --}}<div class="sermon-summary-list-entry__snippet-content">
            <h1 class="sermon-summary-list-entry__title">
                {{ $sermonSummary->title }}
            </h1>
            <p class="sermon-summary-list-entry__subtitle">
                @if ($sermonSummary->subtitle)
                    {{ $sermonSummary->subtitle }}
                @endif
            </p>
            <p class="sermon-summary-list-entry__snippet">
                {{-- Idea from: http://stackoverflow.com/a/79986 --}}
                {{ substr($sermonSummary->content, 0, strpos(wordwrap($sermonSummary->content, 300, '#delim#'), '#delim#')) }}&hellip;
            </p>
            <p class="sermon-summary-list-entry__read-more">
                <span class="sermon-summary-list-entry__read-more__link">Read more&hellip;</span>
            </p>
            <div class="sermon-summary-list-entry__footer">
                <p class="sermon-summary-list-entry__date-created">
                    {{ $sermonSummary->created_at->format('F j, Y') }}
                </p>
            </div>
        </div>
    </div><!--
@endforeach
-->
