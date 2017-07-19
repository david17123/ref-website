@extends('adminLayout')

@section('pageContent')
    <div class="page-content-container">
        @include('component.admin.breadcrumbs')

        <div class="content-layouter">
            <div class="manage-authors">
                <div class="manage-authors__header-container">
                    <h1 class="manage-authors__header">Authors</h1>
                    <a class="manage-authors__create-new input-button" href="{{ route('createAuthor') }}">Create new</a>
                </div>
                <div class="manage-authors__authors">
                    <div class="authors__table-header">
                        <div class="author__id">
                            ID
                        </div>
                        <div class="author__title">
                            Name
                        </div>
                    </div>

                    @foreach ($authors as $author)
                        <a class="authors__entry" href="{{ route('editAuthor', ['author' => $author->id]) }}">
                            <div class="author__id">
                                {{ $author->id }}
                            </div>
                            <div class="author__name">
                                {{ $author->name }}
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
