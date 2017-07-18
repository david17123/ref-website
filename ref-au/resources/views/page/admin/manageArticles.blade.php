@extends('adminLayout')

@section('pageContent')
    <div class="page-content-container">
        @include('component.admin.breadcrumbs')

        <div class="content-layouter">
            <div class="manage-articles">
                <div class="manage-articles__header-container">
                    <h1 class="manage-articles__header">Articles</h1>
                    <a class="manage-articles__create-new input-button" href="{{ route('createArticle') }}">Create new</a>
                </div>
                <div class="manage-articles__articles">
                    <div class="articles__table-header">
                        <div class="article__id">
                            ID
                        </div>
                        <div class="article__content-snippet">
                            Content
                        </div>
                        <div class="article__created-at">
                            Created at
                        </div>
                        <div class="article__author">
                            Author
                        </div>
                        <div class="article__published">
                            Published
                        </div>
                    </div>

                    @foreach ($articles as $article)
                        <a class="articles__entry" href="{{ route('editArticle', ['article' => $article->id]) }}">
                            <div class="article__id">
                                {{ $article->id }}
                            </div>
                            <div class="article__content-snippet">
                                <div class="content-snippet__head">
                                    <span class="content-snippet__title">{{ $article->title }}</span>
                                    <span class="content-snippet__subtitle">{{ $article->subtitle }}</span>
                                </div>
                                <div class="content-snippet__body">
                                    {{ str_limit($article->content, 500) }}
                                </div>
                            </div>
                            <div class="article__created-at">
                                {{ $article->created_at->format('j M Y') }}
                            </div>
                            <div class="article__author">
                                {{ $article->author->name }}
                            </div>
                            <div class="article__published">
                                @if ($article->published)
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
