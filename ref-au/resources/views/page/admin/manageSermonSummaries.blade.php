@extends('adminLayout')

@section('pageContent')
    <div class="page-content-container">
        <div class="side-menu-container">
            @include('component.admin.manageUniSideMenu', ['selectedMenu' => 'sermonSummary'])
        </div>
        <div class="manage-sermon-summaries">
            <div class="manage-sermon-summaries__header-container">
                <h1 class="manage-sermon-summaries__header">Sermon Summaries at {{ $university->name }}</h1>
                <a class="manage-sermon-summary__create-new input-button" href="{{ route('createSermonSummary', ['uniUrl' => $university->subdomain]) }}">Create new</a>
            </div>
            <div class="manage-sermon-summaries__sermon-summaries">
                <div class="sermon-summaries__table-header">
                    <div class="sermon-summaries__id">
                        ID
                    </div>
                    <div class="sermon-summaries__content-snippet">
                        Content
                    </div>
                    <div class="sermon-summaries__date-preached">
                        Sermon date
                    </div>
                    <div class="sermon-summaries__preacher">
                        Preacher
                    </div>
                    <div class="sermon-summaries__summarizer">
                        Summarizer
                    </div>
                </div>

                @foreach ($sermonSummaries as $sermonSummary)
                    <a class="sermon-summaries__entry" href="{{ route('editSermonSummary', ['uniUrl' => $university->subdomain, 'sermonSummary' => $sermonSummary->id]) }}">
                        <div class="sermon-summaries__id">
                            {{ $sermonSummary->id }}
                        </div>
                        <div class="sermon-summaries__content-snippet">
                            <div class="content-snippet__head">
                                <span class="content-snippet__title">{{ $sermonSummary->title }}</span>
                                <span class="content-snippet__subtitle">{{ $sermonSummary->subtitle }}</span>
                            </div>
                            <div class="content-snippet__body">
                                {{ str_limit($sermonSummary->content, 500) }}
                            </div>
                        </div>
                        <div class="sermon-summaries__date-preached">
                            {{ $sermonSummary->date_preached->format('j M Y') }}
                        </div>
                        <div class="sermon-summaries__preacher">
                            {{ $sermonSummary->preacher->name }}
                        </div>
                        <div class="sermon-summaries__summarizer">
                            {{ $sermonSummary->summarizer->name }}
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
