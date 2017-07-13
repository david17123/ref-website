@extends('adminLayout')

@section('pageContent')
    <div class="page-content-container">
        @include('component.admin.breadcrumbs')

        <div class="content-layouter">
            <div class="side-menu-container">
                @include('component.admin.manageUniSideMenu', ['selectedMenu' => 'events'])
            </div>
            <div class="manage-events">
                <div class="manage-events__header-container">
                    <h1 class="manage-events__header">Events at {{ $university->name }}</h1>
                    <a class="manage-events__create-new input-button" href="{{ route('createEvent', ['uniUrl' => $university->subdomain]) }}">Create new</a>
                </div>
                <div class="manage-events__events">
                    <div class="events__table-header">
                        <div class="events__id">
                            ID
                        </div>
                        <div class="events__snippet">
                            Description
                        </div>
                        <div class="events__date-commenced">
                            Date commenced
                        </div>
                        <div class="events__date-finished">
                            Date finished
                        </div>
                    </div>

                    @foreach ($events as $event)
                        <a class="events__entry" href="{{ route('editEvent', ['uniUrl' => $university->subdomain, 'event' => $event->id]) }}">
                            <div class="events__id">
                                {{ $event->id }}
                            </div>
                            <div class="events__snippet">
                                <div class="snippet__head">
                                    <span class="snippet__title">{{ $event->title }}</span>
                                </div>
                                <div class="snippet__body">
                                    {{ str_limit($event->description, 500) }}
                                </div>
                            </div>
                            <div class="events__date-commenced">
                                {{ $event->date_commenced->format('j M Y') }}
                            </div>
                            <div class="events__date-finished">
                                {{ $event->date_finished->format('j M Y') }}
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
