@extends('layouts.public')

@push('custom-css')
    <style>
        #address-map {
            height: 300px;
            width: 100%;
            margin: 10px 0px;
            border: 1px solid #333;
        }

        #address-map iframe {
            height: 100%;
            width: 100%;
        }
    </style>
@endpush

@section('content')
    <div class="container">
        <div class="album">
            <div class="container p-0">
                <div class="row row-cols-1">
                    <div class="col p-0" style="max-height: 410px;">
                        <img class="d-block w-100 h-100" src="{{ $event->event_feature_link }}" alt="First slide">
                    </div>
                </div>

                <div class="row row-cols-2 bg-light">
                    <div class="col-md-8 col-sm-12 p-0">
                        <div class="col px-5 py-4">
                            <h2 class="text-start text-secondary-emphasis">{!! $event->name !!}</h2>
                            <h6 class="text-start">
                            <span class="me-3">
                                <svg style="margin-top: -4px !important;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar3" viewBox="0 0 16 16">
                                  <path
                                      d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2M1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857z"/>
                                  <path
                                      d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
                                </svg>
                                {{ date('d M Y') }}
                            </span>
                                <span class="me-3">
                                <svg style="margin-top: -4px !important;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5"/>
                                </svg>
                                {{ $event->event_location_address }}
                            </span>
                                <span class="me-3">
                                <svg style="margin-top: -4px !important;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/>
                                </svg>
                            {{ $event->event_location }}
                            </span>
                            </h6>
                        </div>

                        <div class="col px-5 py-4 pt-0">
                            {!! $event->long_desc !!}
                        </div>

                        <div class="col px-5 py-4 text-center">
                            <a href="{{ url('/'. $event->slug.'/purchase') }}" class="btn btn-success px-5">Buy Tickets</a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 px-5 py-4">
                        <div id="address-map">
                            {!! $event->event_location_map !!}
                        </div>

                        <div id="organizer-section" class="mt-4">
                            <h6>Organized By</h6>
                            <div class="d-flex flex-column">
                                @if($event->getOrganizerInfo($event->organizer_info))
                                    @foreach($event->getOrganizerInfo($event->organizer_info) as $organizer)
                                        <a href="{{ $organizer['org_social_url'] }}" class="w-100">
                                            <div class="card border-1 mb-3">
                                                <h5 class="card-title py-1 px-2">{{ $organizer['org_name'] }}</h5>
                                                <img src="https://placehold.co/450x150/343434/FFF.webp" class="" alt="{{ $organizer['org_name']." Logo" }}">
                                            </div>
                                        </a>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
