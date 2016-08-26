@extends('defaultLayout')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ elixir('css/page/articlesList.css') }}"/>
@endpush

@push('js')
    <script type="text/javascript" src="{{ elixir('js/page/articlesList.js') }}"></script>
@endpush

@section('pageContent')
    <div class="page-content-container">
        <h1 class="page-header">Articles</h1>
        <div class="articles-container">
            @include('component.articlesListTemplate', ['articles' => $articles])
        </div>
    </div>
@endsection
