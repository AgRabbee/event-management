<table id="event-list" class="table table-bordered table-striped table-responsive-sm">
    <thead>
    <tr style="text-align: center;">
        <th style="width: 4%;">Sl</th>
        <th style="width: 25%;">Name</th>
        <th style="width: 14%;">Starts</th>
        <th style="width: 14%;">Ends</th>
        <th style="width: 25%;">Address</th>
        <th style="width: 8%;">Status</th>
        <th style="width: 10%;">Action</th>
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
                    }
                    else{
                        if ($event->event_from > date('Y-m-d h:i:s')) {
                            $statusTag = 'Upcoming';
                        } elseif ($event->event_from <= date('Y-m-d h:i:s') && $event->event_to >= date('Y-m-d h:i:s')) {
                            $statusTag = 'Ongoing';
                        } else {
                            $statusTag = 'Archived';
                        }
                    }
                @endphp
                <td class="text-center">{{ $statusTag }}</td>
                <td class="text-center">
                    <a href="{{ route('events.show', $event->slug) }}" class="btn btn-xs btn-warning">View Details</a>
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
