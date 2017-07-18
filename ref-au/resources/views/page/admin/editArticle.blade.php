@extends('adminLayout')

@push('js')
    <script type="text/javascript" src="{{ elixir('js/page/admin/editArticle.js') }}"></script>
@endpush

@section('pageContent')
    <div class="page-content-container">
        @include('component.admin.breadcrumbs')

        <div class="content-layouter">
            <div class="edit-article">
                <form action="{{ route('saveArticle') }}" method="post">
                    {{ csrf_field() }}

                    @if ( isset($article) )
                        <input type="hidden" name="articleId" value="{{ $article->id }}" />
                    @endif

                    @include('component.forms.simple2ColumnsTextbox', [
                        'name' => 'title',
                        'textName' => 'Title',
                        'defaultValue' => isset($article) ? $article->title : '',
                        'required' => true
                    ])
                    @include('component.forms.simple2ColumnsTextbox', [
                        'name' => 'subtitle',
                        'textName' => 'Subtitle',
                        'defaultValue' => isset($article) ? $article->subtitle : '',
                        'required' => false
                    ])
                    @include('component.forms.simple2ColumnsTextarea', [
                        'name' => 'content',
                        'textName' => 'Content',
                        'defaultValue' => isset($article) ? $article->content : '',
                        'required' => true
                    ])
                    @include('component.forms.simple2ColumnsRefSelectBox', [
                        'name' => 'author',
                        'textName' => 'Author',
                        'defaultValue' => isset($article) && $article->author ? $article->author_id : '',
                        'defaultValueText' => isset($article) && $article->author ? $article->author->name : '',
                        'minimumInputLength' => 0,
                        'allowClear' => false,
                        'multiple' => false,
                        'optionsAjaxUrl' => $preachersAjaxUrl,
                        'optionsAjaxField' => 'name'
                    ])
                    @include('component.forms.simple2ColumnsFileInput', [
                        'name' => 'heroImage',
                        'textName' => 'Hero image',
                        'assets' => isset($article) ? [$article->heroImage] : [],
                        'multiple' => false,
                        'uploadUrl' => route('adminFileUploadHandler')
                    ])

                    <input class="save-button input-button" type="submit" value="Save">
                    @if ( isset($article) )
                        <a class="delete-button js-delete-button" href="{{ route('deleteArticle', ['article' => $article->id]) }}">Delete</a>
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection
