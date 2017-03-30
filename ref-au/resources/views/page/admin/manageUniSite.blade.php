@extends('adminLayout')

@push('js')
    <script type="text/javascript" src="{{ elixir('js/page/admin/manageUniSite.js') }}"></script>
@endpush

@section('pageContent')
    <div class="page-content-container">
        <div class="side-menu-container">
            @include('component.admin.manageUniSideMenu', ['selectedMenu' => 'site'])
        </div>
        <div class="manage-uni-site">
            <form action="{{ route('saveUniSiteData', ['uniUrl' => $university->subdomain]) }}" method="post">
                {{ csrf_field() }}

                <div class="form-field">
                    <div class="form-field__label">
                        University name
                    </div>
                    <div class="form-field__input">
                        <input class="input-text" type="text" name="name" value="{{ old('name') ? old('name') : $university->name }}" />
                    </div>
                </div>
                <div class="form-field">
                    <div class="form-field__label">
                        Subdomain
                    </div>
                    <div class="form-field__input">
                        <input class="input-text" type="text" name="subdomain" value="{{ old('subdomain') ? old('subdomain') : $university->subdomain }}" />
                    </div>
                </div>
                <div class="form-field">
                    <div class="form-field__label">
                        Published
                    </div>
                    <div class="form-field__input">
                        <input type="checkbox" name="published" value="1" {{ isset($university->published) && $university->published ? 'checked="checked"' : '' }} />
                    </div>
                </div>
                <div class="form-field">
                    <div class="form-field__label">
                        Meeting place
                    </div>
                    <div class="form-field__input">
                        <input class="input-text" type="text" name="meetingPlace" value="{{ old('meetingPlace') ? old('meetingPlace') : $university->meeting_place }}" />
                    </div>
                </div>
                <div class="form-field">
                    <div class="form-field__label">
                        Meeting time
                    </div>
                    <div class="form-field__input">
                        <input class="input-text" type="text" name="meetingTime" value="{{ old('meetingTime') ? old('meetingTime') : $university->meeting_time }}" />
                    </div>
                </div>
                <div class="form-field">
                    <div class="form-field__label">
                        Contact person
                    </div>
                    <div class="form-field__input">
                        <input class="input-text" type="text" name="contactPerson" value="{{ old('contactPerson') ? old('contactPerson') : $university->contact_person }}" />
                    </div>
                </div>
                <div class="form-field">
                    <div class="form-field__label">
                        Logo
                    </div>
                    <div class="form-field__input">
                        @include('component.simpleFileInput', [
                            'name' => 'uniLogo',
                            'assets' => [$university->logo],
                            'multiple' => false,
                            'uploadUrl' => route('adminFileUploadHandler')
                        ])
                    </div>
                </div>
                <input class="save-button input-button" type="submit" value="Save">
            </form>
        </div>
    </div>
@endsection
