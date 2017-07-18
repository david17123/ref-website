@extends('adminLayout')

@push('js')
    <script type="text/javascript" src="{{ elixir('js/page/admin/editSermonSummary.js') }}"></script>
@endpush

@section('pageContent')
    <div class="page-content-container">
        @include('component.admin.breadcrumbs')

        <div class="content-layouter">
            <div class="side-menu-container">
                @include('component.admin.manageUniSideMenu', ['selectedMenu' => 'sermonSummaries'])
            </div>
            <div class="edit-sermon-summary">
                <form action="{{ route('saveSermonSummary', ['uniUrl' => $university->subdomain]) }}" method="post">
                    {{ csrf_field() }}

                    @if ( isset($sermonSummary) )
                        <input type="hidden" name="sermonSummaryId" value="{{ $sermonSummary->id }}" />
                    @endif

                    @include('component.forms.simple2ColumnsTextbox', [
                        'name' => 'title',
                        'textName' => 'Title',
                        'defaultValue' => isset($sermonSummary) ? $sermonSummary->title : '',
                        'required' => true
                    ])
                    @include('component.forms.simple2ColumnsTextbox', [
                        'name' => 'subtitle',
                        'textName' => 'Subtitle',
                        'defaultValue' => isset($sermonSummary) ? $sermonSummary->subtitle : '',
                        'required' => true
                    ])
                    @include('component.forms.simple2ColumnsTextarea', [
                        'name' => 'content',
                        'textName' => 'Content',
                        'defaultValue' => isset($sermonSummary) ? $sermonSummary->content : '',
                        'required' => true
                    ])
                    @include('component.forms.simple2ColumnsRefSelectBox', [
                        'name' => 'preacher',
                        'textName' => 'Preacher',
                        'defaultValue' => isset($sermonSummary) && $sermonSummary->preacher ? $sermonSummary->preacher_id : '',
                        'defaultValueText' => isset($sermonSummary) && $sermonSummary->preacher ? $sermonSummary->preacher->name : '',
                        'minimumInputLength' => 0,
                        'allowClear' => false,
                        'multiple' => false,
                        'optionsAjaxUrl' => $preachersAjaxUrl,
                        'optionsAjaxField' => 'name'
                    ])
                    @include('component.forms.simple2ColumnsRefSelectBox', [
                        'name' => 'summarizer',
                        'textName' => 'Summarizer',
                        'defaultValue' => isset($sermonSummary) && $sermonSummary->summarizer ? $sermonSummary->summarizer_id : '',
                        'defaultValueText' => isset($sermonSummary) && $sermonSummary->summarizer ? $sermonSummary->summarizer->name : '',
                        'minimumInputLength' => 0,
                        'allowClear' => false,
                        'multiple' => false,
                        'optionsAjaxUrl' => $preachersAjaxUrl,
                        'optionsAjaxField' => 'name'
                    ])
                    @include('component.forms.simple2ColumnsDate', [
                        'name' => 'datePreached',
                        'textName' => 'Date preached',
                        'defaultValue' => isset($sermonSummary) ? $sermonSummary->date_preached->toDateString() : '',
                        'required' => true
                    ])
                    @include('component.forms.simple2ColumnsFileInput', [
                        'name' => 'heroImage',
                        'textName' => 'Hero image',
                        'assets' => isset($sermonSummary) ? [$sermonSummary->heroImage] : [],
                        'multiple' => false,
                        'uploadUrl' => route('adminFileUploadHandler')
                    ])
                    @include('component.forms.simple2ColumnsCheckbox', [
                        'name' => 'published',
                        'textName' => 'Published',
                        'defaultValue' => isset($sermonSummary->published) && $sermonSummary->published
                    ])

                    <input class="save-button input-button" type="submit" value="Save">
                    @if ( isset($sermonSummary) )
                        <a class="delete-button js-delete-button" href="{{ route('deleteSermonSummary', ['uniUrl' => $university->subdomain, 'sermonSummary' => $sermonSummary->id]) }}">Delete</a>
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection
