@extends('adminLayout')

@push('js')
    <script type="text/javascript" src="{{ elixir('js/page/admin/editPicquote.js') }}"></script>
@endpush

@section('pageContent')
    <div class="page-content-container">
        @include('component.admin.breadcrumbs')

        <div class="content-layouter">
            <div class="edit-picquote">
                <form action="{{ route('savePicquote') }}" method="post">
                    {{ csrf_field() }}

                    @if ( isset($picquote) )
                        <input type="hidden" name="picquoteId" value="{{ $picquote->id }}" />
                    @endif

                    @include('component.forms.simple2ColumnsTextbox', [
                        'name' => 'title',
                        'textName' => 'Title',
                        'defaultValue' => isset($picquote) ? $picquote->title : '',
                        'required' => true
                    ])
                    @include('component.forms.simple2ColumnsFileInput', [
                        'name' => 'image',
                        'textName' => 'Image',
                        'assets' => isset($picquote) ? [$picquote->image] : [],
                        'multiple' => false,
                        'uploadUrl' => route('adminFileUploadHandler')
                    ])
                    @include('component.forms.simple2ColumnsCheckbox', [
                        'name' => 'published',
                        'textName' => 'Published',
                        'defaultValue' => isset($picquote->published) && $picquote->published
                    ])

                    <input class="save-button input-button" type="submit" value="Save">
                    @if ( isset($picquote) )
                        <a class="delete-button js-delete-button" href="{{ route('deletePicquote', ['picquote' => $picquote->id]) }}">Delete</a>
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection
