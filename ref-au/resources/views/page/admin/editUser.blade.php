@extends('adminLayout')

@push('js')
    <script type="text/javascript" src="{{ elixir('js/page/admin/editUser.js') }}"></script>
@endpush

@section('pageContent')
    <div class="page-content-container">
        @include('component.admin.breadcrumbs')

        <div class="content-layouter">
            <div class="edit-user">
                <form action="{{ route('saveUser') }}" method="post">
                    {{ csrf_field() }}

                    @if ( isset($user) )
                        <input type="hidden" name="userId" value="{{ $user->id }}" />
                    @endif

                    @include('component.forms.simple2ColumnsTextbox', [
                        'name' => 'name',
                        'textName' => 'Name',
                        'defaultValue' => isset($user) ? $user->name : '',
                        'required' => true
                    ])
                    @include('component.forms.simple2ColumnsTextbox', [
                        'name' => 'email',
                        'textName' => 'Email',
                        'defaultValue' => isset($user) ? $user->email : '',
                        'required' => true
                    ])
                    @can ('updateRole', $user)
                        @include('component.forms.simple2ColumnsRefSelectBox', [
                            'name' => 'roleId',
                            'textName' => 'Role',
                            'defaultValue' => isset($user) && $user->role ? $user->role_id : '',
                            'defaultValueText' => isset($user) && $user->role ? $user->role->title : '',
                            'minimumInputLength' => 0,
                            'allowClear' => true,
                            'multiple' => false,
                            'optionsAjaxUrl' => $rolesAjaxUrl,
                            'optionsAjaxField' => 'title'
                        ])
                    @endcan

                    <input class="save-button input-button" type="submit" value="Save">
                    @if ( isset($user) && policy($user)->delete(Auth::user(), $user))
                        <a class="delete-button js-delete-button" href="{{ route('deleteUser', ['user' => $user->id]) }}">Delete</a>
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection
