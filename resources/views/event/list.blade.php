<table id="event-list" class="table table-bordered table-striped table-responsive-sm">
    <thead>
    <tr style="text-align: center;">
        <th>Sl</th>
        <th>Event Name</th>
        <th>Event Duration</th>
        <th>Address</th>
    </tr>
    </thead>
    <tbody>
    @if(count($events) > 0)
        @php $index = 0 @endphp
        @foreach($events as $event)
            <tr>
                <td>{{ ++$index }}</td>
                <td>{{ $event->name }}</td>
                <td>{{ date('Y-m-d h:i A', strtotime($event->event_from)) }} to {{ date('Y-m-d h:i A', strtotime($event->event_to)) }}</td>
                <td>{{ $event->event_location_address }}</td>
                @php
                    $statusTag = $event->status == 1 ? 'Inactive' : 'Active';
                    $statusClass = $event->status == 1 ? 'bg-gradient-warning' : 'bg-gradient-primary';
                    $status = $event->status == 1 ? 0 : 1;
                @endphp
                <td>
                    <button type="button" data-event-id="{{ $event->id }}"
{{--                            data-update-status-route="{{ route('event.update_status', $event->id) }}"--}}
                            data-status="{{ $status }}" id="btn-active-inActive" class="btn btn-xs custom-action-btn {{ $statusClass }}">
                        {{ $statusTag }}
                    </button>
                    <button type="button" id="edit-btn"
{{--                            data-edit-route="{{ route('event.edit', $event->id) }}" --}}
                            class="btn btn-xs btn-success">
                        Edit
                    </button>
                </td>
            </tr>
        @endforeach
    @else
        <tr>
            <td colspan="7" style="text-align: center">No Record Found</td>
        </tr>
    @endif
    </tbody>
</table>
