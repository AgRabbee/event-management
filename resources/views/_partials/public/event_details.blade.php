<h5 class="m-0">Event Details</h5>
<hr class="my-1">
<h6 class="m-0">{{ $event->name }}</h6>
<p class="m-0"><small class="text-muted">{{ date('d M Y h:i A', strtotime($event->event_from)) }}</small></p>
<?php
$org_names = array_column($event->getOrganizerInfo($event->organizer_info), 'org_name');
$imploded_names = implode(", ", $org_names);
?>
<p class="m-0"><small class="text-muted">Organized By: {{ $imploded_names }}</small></p>
<p class="m-0"><small class="text-muted">Venue: {{ $event->event_location_address }}</small></p>
