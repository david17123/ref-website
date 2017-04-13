@extends('adminLayout')

@push('js')
    <script type="text/javascript" src="{{ elixir('js/page/admin/editSermonSummary.js') }}"></script>
@endpush

@section('pageContent')
    <div class="page-content-container">
        <div class="side-menu-container">
            @include('component.admin.manageUniSideMenu', ['selectedMenu' => 'sermonSummary'])
        </div>
        <div class="edit-sermon-summary">
            <form action="{{ route('saveSermonSummary', ['uniUrl' => $university->subdomain]) }}" method="post">
                {{ csrf_field() }}

                @if ( isset($sermonSummary) )
                    <input type="hidden" name="sermonSummaryId" value="{{ $sermonSummary->id }}" />
                @endif

                <div class="form-field">
                    <div class="form-field__label">
                        Title
                    </div>
                    <div class="form-field__input">
                        <input class="input-text" type="text" name="title" value="{{ old('title') ? old('title') : (isset($sermonSummary) ? $sermonSummary->title : '') }}" required />
                    </div>
                </div>
                <div class="form-field">
                    <div class="form-field__label">
                        Subtitle
                    </div>
                    <div class="form-field__input">
                        <input class="input-text" type="text" name="subtitle" value="{{ old('subtitle') ? old('subtitle') : (isset($sermonSummary) ? $sermonSummary->subtitle : '') }}" />
                    </div>
                </div>
                <div class="form-field">
                    <div class="form-field__label">
                        Content
                    </div>
                    <div class="form-field__input">
                        <textarea name="content" class="input-text" required>{{ old('content') ? old('content') : (isset($sermonSummary) ? $sermonSummary->content : '') }}</textarea>
                    </div>
                </div>
                <div class="form-field">
                    <div class="form-field__label">
                        Preacher
                    </div>
                    <div class="form-field__input">
                        <select class="js-preacher-select" name="preacher">
                            @if (isset($sermonSummary) && $sermonSummary->preacher)
                                <option value="{{ $sermonSummary->preacher_id }}">{{ $sermonSummary->preacher->name }}</option>
                            @endif
                        </select>
                    </div>
                </div>
                <div class="form-field">
                    <div class="form-field__label">
                        Summarizer
                    </div>
                    <div class="form-field__input">
                        <select class="js-summarizer-select" name="summarizer">
                            @if (isset($sermonSummary) && $sermonSummary->summarizer)
                                <option value="{{ $sermonSummary->summarizer_id }}">{{ $sermonSummary->summarizer->name }}</option>
                            @endif
                        </select>
                    </div>
                </div>
                <div class="form-field">
                    <div class="form-field__label">
                        Date preached
                    </div>
                    <div class="form-field__input">
                        <input class="input-text" type="date" name="datePreached" value="{{ old('datePreached') ? old('datePreached') : (isset($sermonSummary) ? $sermonSummary->date_preached->toDateString() : '') }}" required />
                    </div>
                </div>
                <div class="form-field">
                    <div class="form-field__label">
                        Hero image
                    </div>
                    <div class="form-field__input">
                        @if ( isset($sermonSummary) )
                            @include('component.simpleFileInput', [
                                'name' => 'heroImage',
                                'assets' => [$sermonSummary->heroImage],
                                'multiple' => false,
                                'uploadUrl' => route('adminFileUploadHandler')
                            ])
                        @else
                            @include('component.simpleFileInput', [
                                'name' => 'heroImage',
                                'assets' => [],
                                'multiple' => false,
                                'uploadUrl' => route('adminFileUploadHandler')
                            ])
                        @endif
                    </div>
                </div>

                <input class="save-button input-button" type="submit" value="Save">
                @if ( isset($sermonSummary) )
                    <a class="delete-button js-delete-button" href="{{ route('deleteSermonSummary', ['uniUrl' => $university->subdomain, 'sermonSummary' => $sermonSummary->id]) }}">Delete</a>
                @endif
            </form>
        </div>
    </div>
@endsection
