@extends('adminLayout')

@section('pageContent')
    <div class="page-content-container">
        @include('component.admin.breadcrumbs')

        <div class="content-layouter">
            <div class="manage-picquotes">
                <div class="manage-picquotes__header-container">
                    <h1 class="manage-picquotes__header">Picquotes</h1>
                    <a class="manage-picquotes__create-new input-button" href="{{ route('createPicquote') }}">Create new</a>
                </div>
                <div class="manage-picquotes__picquotes">
                    <div class="picquotes__table-header">
                        <div class="picquote__id">
                            ID
                        </div>
                        <div class="picquote__title">
                            Title
                        </div>
                        <div class="picquote__created-at">
                            Created at
                        </div>
                        <div class="picquote__published">
                            Published
                        </div>
                    </div>

                    @foreach ($picquotes as $picquote)
                        <a class="picquotes__entry" href="{{ route('editPicquote', ['picquote' => $picquote->id]) }}">
                            <div class="picquote__id">
                                {{ $picquote->id }}
                            </div>
                            <div class="picquote__title">
                                {{ $picquote->title }}
                            </div>
                            <div class="picquote__created-at">
                                {{ $picquote->created_at->format('j M Y') }}
                            </div>
                            <div class="picquote__published">
                                @if ($picquote->published)
                                    <i class="material-icons published">&#xE876;</i>
                                @else
                                    <i class="material-icons unpublished">&#xE14C;</i>
                                @endif
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
