<table id="event-list" class="table table-bordered table-striped table-responsive-sm">
    <thead>
    <tr style="text-align: center;">
        <th style="width: 4%;">Sl</th>
        <th style="width: 25%;">Name</th>
        <th style="width: 14%;">Starts</th>
        <th style="width: 14%;">Ends</th>
        <th style="width: 25%;">Address</th>
        <th style="width: 8%;">Status</th>
        <th style="width: 12%;">Action</th>
    </tr>
    </thead>
    <tbody>
    @if(count($events) > 0)
        @php $index = 0 @endphp
        @foreach($events as $event)
            <tr>
                <td class="text-center">{{ ++$index }}</td>
                <td>{{ $event->name }}</td>
                <td>{{ date('d M Y h:i A', strtotime($event->event_from)) }}</td>
                <td>{{ date('d M Y h:i A', strtotime($event->event_to)) }}</td>
                <td>{{ $event->event_location_address }}</td>
                @php
                    if($event->status == 0){
                    $statusTag = 'Draft';
                    $btnText = 'Publish';
                    $statusClass = 'bg-gradient-success';
                    $status = 1;
                    }
                    else{
                        if (strtotime($event->event_from) > time()) {
                            $statusTag = 'Upcoming';
                            $btnText = 'Draft';
                            $statusClass = 'bg-gradient-warning';
                            $status = 0;
                        } elseif (strtotime($event->event_from) <= time() && strtotime($event->event_to) >= time()) {
                            $statusTag = 'Ongoing';
                            $btnText = $statusTag;
                            $statusClass = 'bg-gradient-secondary';
                            $status = -1;
                        } else {
                            $statusTag = 'Archived';
                            $btnText = $statusTag;
                            $statusClass = 'bg-gradient-secondary';
                            $status = -1;
                        }
                    }
                @endphp
                <td class="text-center">{{ $statusTag }}</td>
                <td class="text-center">
                    <button type="button" {{ $statusClass == 'bg-gradient-secondary' ? 'disabled' : '' }}
                    data-update-status-route="{{ url("dashboard/events/$event->slug/status") }}"
                            data-status="{{ $status }}" id="btn-active-inActive" class="btn btn-xs custom-action-btn {{ $statusClass }}">
                        {{ $btnText }}
                    </button>

                    <a href="{{ route('events.show', $event->slug) }}" class="btn btn-xs btn-secondary">Details</a>
                </td>
            </tr>
        @endforeach
    @else
        <tr>
            <td colspan="6" style="text-align: center">No Record Found</td>
        </tr>
    @endif
    </tbody>
</table>
