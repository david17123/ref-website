@extends('defaultLayout')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ elixir('css/page/sermonSummariesList.css') }}"/>
@endpush

@section('pageContent')
    <div class="page-content-container">
        <h1 class="page-header">Weekly Sermon Summary</h1>
        <div class="sermon-summaries-container">
            @include('component.sermonSummariesListTemplate', ['sermonSummaries' => $sermonSummaries])
        </div>
    </div>
@endsection
