@extends('adminLayout')

@push('js')
    <script type="text/javascript" src="{{ elixir('js/page/admin/editEvent.js') }}"></script>
@endpush

@section('pageContent')
    <div class="page-content-container">
        @include('component.admin.breadcrumbs')

        <div class="content-layouter">
            <div class="side-menu-container">
                @include('component.admin.manageUniSideMenu', ['selectedMenu' => 'events'])
            </div>
            <div class="edit-event">
                <form action="{{ route('saveEvent', ['uniUrl' => $university->subdomain]) }}" method="post">
                    {{ csrf_field() }}

                    @if ( isset($event) )
                        <input type="hidden" name="eventId" value="{{ $event->id }}" />
                    @endif

                    @include('component.forms.simple2ColumnsTextbox', [
                        'name' => 'title',
                        'textName' => 'Title',
                        'defaultValue' => isset($event) ? $event->title : '',
                        'required' => true
                    ])
                    @include('component.forms.simple2ColumnsTextarea', [
                        'name' => 'description',
                        'textName' => 'Description',
                        'defaultValue' => isset($event) ? $event->description : '',
                        'required' => false
                    ])
                    @include('component.forms.simple2ColumnsDate', [
                        'name' => 'dateCommenced',
                        'textName' => 'Date commenced',
                        'defaultValue' => isset($event) ? $event->date_commenced->toDateString() : '',
                        'required' => true
                    ])
                    @include('component.forms.simple2ColumnsDate', [
                        'name' => 'dateFinished',
                        'textName' => 'Date finished',
                        'defaultValue' => isset($event) ? $event->date_finished->toDateString() : '',
                        'required' => true
                    ])

                    <input class="save-button input-button" type="submit" value="Save">
                    @if ( isset($event) )
                        <a class="delete-button js-delete-button" href="{{ route('deleteEvent', ['uniUrl' => $university->subdomain, 'event' => $event->id]) }}">Delete</a>
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection
