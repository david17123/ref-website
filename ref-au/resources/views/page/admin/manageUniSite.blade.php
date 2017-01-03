@extends('adminLayout')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ elixir('css/page/admin/manageUniSite.css') }}"/>
@endpush

@section('pageContent')
    <div class="page-content-container">
        <div class="side-menu-container">
            @include('component.admin.manageUniSideMenu', ['selectedMenu' => 'site'])
        </div>
        <div class="manage-uni-site">
            <form action="{{ route('submitUniSiteData', ['uniUrl' => $university->subdomain]) }}" method="post">
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
                <input class="save-button input-button" type="submit" value="Save">
            </form>
        </div>
    </div>
@endsection
