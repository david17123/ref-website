@extends('adminLayout')

@push('js')
    <script type="text/javascript" src="{{ elixir('js/page/admin/editAuthor.js') }}"></script>
@endpush

@section('pageContent')
    <div class="page-content-container">
        @include('component.admin.breadcrumbs')

        <div class="content-layouter">
            <div class="edit-author">
                <form action="{{ route('saveAuthor') }}" method="post">
                    {{ csrf_field() }}

                    @if ( isset($author) )
                        <input type="hidden" name="authorId" value="{{ $author->id }}" />
                    @endif

                    @include('component.forms.simple2ColumnsTextbox', [
                        'name' => 'name',
                        'textName' => 'Name',
                        'defaultValue' => isset($author) ? $author->name : '',
                        'required' => true
                    ])
                    @include('component.forms.simple2ColumnsRefSelectBox', [
                        'name' => 'userId',
                        'textName' => 'User',
                        'defaultValue' => isset($author) && $author->user ? $author->user_id : '',
                        'defaultValueText' => isset($author) && $author->user ? $author->user->name : '',
                        'minimumInputLength' => 0,
                        'allowClear' => true,
                        'multiple' => false,
                        'optionsAjaxUrl' => $usersAjaxUrl,
                        'optionsAjaxField' => 'name'
                    ])

                    <input class="save-button input-button" type="submit" value="Save">
                    @if ( isset($author) )
                        <a class="delete-button js-delete-button" href="{{ route('deleteAuthor', ['author' => $author->id]) }}">Delete</a>
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection
