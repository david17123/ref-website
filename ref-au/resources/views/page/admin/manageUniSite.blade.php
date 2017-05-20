@extends('adminLayout')

@push('js')
    <script type="text/javascript" src="{{ elixir('js/page/admin/manageUniSite.js') }}"></script>
@endpush

@section('pageContent')
    <div class="page-content-container">
        @include('component.admin.breadcrumbs')

        <div class="content-layouter">
            <div class="side-menu-container">
                @include('component.admin.manageUniSideMenu', ['selectedMenu' => 'site'])
            </div>
            <div class="manage-uni-site">
                <form action="{{ route('saveUniSiteData', ['uniUrl' => $university->subdomain]) }}" method="post">
                    {{ csrf_field() }}

                    @include('component.forms.simple2ColumnsTextbox', [
                        'name' => 'name',
                        'textName' => 'University name',
                        'defaultValue' => $university->name,
                        'required' => true
                    ])
                    @include('component.forms.simple2ColumnsTextbox', [
                        'name' => 'subdomain',
                        'textName' => 'Subdomain',
                        'defaultValue' => $university->subdomain,
                        'required' => true
                    ])
                    @include('component.forms.simple2ColumnsCheckbox', [
                        'name' => 'published',
                        'textName' => 'Published',
                        'defaultValue' => isset($university->published) && $university->published
                    ])
                    @include('component.forms.simple2ColumnsTextbox', [
                        'name' => 'meetingPlace',
                        'textName' => 'Meeting place',
                        'defaultValue' => $university->meeting_place,
                        'required' => true
                    ])
                    @include('component.forms.simple2ColumnsTextbox', [
                        'name' => 'meetingTime',
                        'textName' => 'Meeting time',
                        'defaultValue' => $university->meeting_time,
                        'required' => true
                    ])
                    @include('component.forms.simple2ColumnsTextbox', [
                        'name' => 'contactPerson',
                        'textName' => 'Contact person',
                        'defaultValue' => $university->contact_person,
                        'required' => true
                    ])
                    @include('component.forms.simple2ColumnsFileInput', [
                        'name' => 'uniLogo',
                        'textName' => 'Logo',
                        'assets' => $university->logo ? [$university->logo] : [],
                        'multiple' => false,
                        'uploadUrl' => route('adminFileUploadHandler')
                    ])
                    @include('component.forms.simple2ColumnsFileInput', [
                        'name' => 'banners',
                        'textName' => 'Banners',
                        'assets' => $university->bannersAssetGroup ? $university->bannersAssetGroup->assets : [],
                        'multiple' => true,
                        'uploadUrl' => route('adminFileUploadHandler')
                    ])
                    @include('component.forms.simple2ColumnsFileInput', [
                        'name' => 'clubPictures',
                        'textName' => 'Club pictures',
                        'assets' => $university->clubPicturesAssetGroup ? $university->clubPicturesAssetGroup->assets : [],
                        'multiple' => true,
                        'uploadUrl' => route('adminFileUploadHandler')
                    ])

                    <input class="save-button input-button" type="submit" value="Save">
                    <a class="delete-button js-delete-button" href="{{ route('deleteUniSite', ['uniUrl' => $university->subdomain]) }}">Delete</a>
                </form>
            </div>
        </div>
    </div>
@endsection
