@extends('defaultLayout')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ elixir('css/page/picquotesList.css') }}"/>
@endpush

@push('js')
    <script type="text/javascript" src="{{ elixir('js/page/picquotesList.js') }}"></script>
@endpush

@section('pageContent')
    <div class="page-content-container">
        <h1 class="page-header">Picquotes</h1>
        <div class="picquotes-container js-picquotes-container">

            @foreach ($picquotes as $picquote)
                <a class="picquote js-picquote" style="background-image: url('{{ $picquote->image->getUrl() }}')" href="{{ $picquote->image->getUrl() }}"></a>
            @endforeach

        </div>
    </div>
@endsection
