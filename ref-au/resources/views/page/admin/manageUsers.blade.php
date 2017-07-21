@extends('adminLayout')

@section('pageContent')
    <div class="page-content-container">
        @include('component.admin.breadcrumbs')

        <div class="content-layouter">
            <div class="manage-users">
                <div class="manage-users__header-container">
                    <h1 class="manage-users__header">Users</h1>
                    <a class="manage-users__create-new input-button" href="{{ route('createUser') }}">Create new</a>
                </div>
                <div class="manage-users__users">
                    <div class="users__table-header">
                        <div class="user__id">
                            ID
                        </div>
                        <div class="user__name">
                            Name
                        </div>
                        <div class="user__email">
                            Email
                        </div>
                    </div>

                    @foreach ($users as $user)
                        <a class="users__entry" href="{{ route('editUser', ['user' => $user->id]) }}">
                            <div class="user__id">
                                {{ $user->id }}
                            </div>
                            <div class="user__name">
                                {{ $user->name }}
                            </div>
                            <div class="user__email">
                                {{ $user->email }}
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
