@extends('layouts.admin')

@section('title', "Event | " . $event->name)

@section('admin-custom-css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}">
    <style>
        .custom-info-icon {
            position: absolute;
            right: 10px;
            top: 10px;
        }
        #event_details p{
            display: inline;
        }

        #event_details p span{
            font-size: 16px !important;
        }
        #map_div{
            height: 200px;
            margin-bottom: 10px;
        }
        #map_div iframe{
            width: 35%;
            height: 100%;
            vertical-align: text-top;
        }
    </style>
@endsection

@section('content')
    <section class="p-2">
        <div class="container-fluid bg-light">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <div class="col">
                    <div class="card shadow-sm">
                        <a href="" class="d-flex text-dark text-center">
                            <div class="card-body">Ticket Packages</div>
                            @if(!$event?->eventConfiguration?->ticket_packages)
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-info-square-fill custom-info-icon text-danger" viewBox="0 0 16 16">
                                    <path
                                        d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm8.93 4.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM8 5.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2"></path>
                                </svg>
                            @endif
                        </a>
                    </div>
                </div>

                <div class="col">
                    <div class="card shadow-sm">
                        <a href="{{ route('events.formFields', $event->slug) }}" class="d-flex text-dark text-center">
                            <div class="card-body">Form Field</div>
                            @if(!$event?->eventConfiguration?->form_fields)
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-info-square-fill custom-info-icon text-danger" viewBox="0 0 16 16">
                                    <path
                                        d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm8.93 4.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM8 5.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2"></path>
                                </svg>
                            @endif
                        </a>
                    </div>
                </div>

                <div class="col">
                    <div class="card shadow-sm">
                        <a href="" class="d-flex text-dark text-center">
                            <div class="card-body">SMS & Email Format</div>
                            @if(!$event?->eventConfiguration?->sms_format || !$event?->eventConfiguration?->mail_format)
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-info-square-fill custom-info-icon text-danger" viewBox="0 0 16 16">
                                    <path
                                        d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm8.93 4.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM8 5.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2"></path>
                                </svg>
                            @endif
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="p-2" id="event_details">
        <div class="container-fluid bg-light">
            <div class="card shadow-sm">
                <div class="relative pt-3 pr-3">
                    @if(strtotime($event->ticket_available_till) > time())
                    <a href="{{ route('events.edit', $event->slug) }}" class="btn col-1 bg-gradient-info btn-sm float-right"><i class="fa fa-pen"></i>&nbsp;&nbsp;Edit</a>
                    @endif
                </div>
                <div class="row px-3">
                    <div class="col-4 col-md-3 col-lg-2 font-weight-bold">Name</div>
                    <div class="col-8 col-md-9 col-lg-10">: {{ $event->name }}</div>
                </div>
                <div class="row pt-3 px-3">
                    <div class="col-4 col-md-3 col-lg-2 font-weight-bold">Short Description</div>
                    <div class="col-8 col-md-9 col-lg-10">: {!! $event->short_desc !!}</div>
                </div>
                <div class="row pt-3 px-3">
                    <div class="col-4 col-md-3 col-lg-2 font-weight-bold">Long Description</div>
                    <div class="col-8 col-md-9 col-lg-10">: {!! $event->long_desc !!}</div>
                </div>
                <div class="row pt-3 px-3">
                    <div class="col-4 col-md-3 col-lg-2 font-weight-bold">Event From</div>
                    <div class="col-8 col-md-9 col-lg-10">: {{ date('d M Y h:i A', strtotime($event->event_from)) }}</div>
                </div>
                <div class="row pt-3 px-3">
                    <div class="col-4 col-md-3 col-lg-2 font-weight-bold">Event To</div>
                    <div class="col-8 col-md-9 col-lg-10">: {{ date('d M Y h:i A', strtotime($event->event_to)) }}</div>
                </div>
                <div class="row pt-3 px-3">
                    <div class="col-4 col-md-3 col-lg-2 font-weight-bold">Ticket Available Till</div>
                    <div class="col-8 col-md-9 col-lg-10">: {{ date('d M Y h:i A', strtotime($event->ticket_available_till)) }}</div>
                </div>
                <div class="row pt-3 px-3">
                    <div class="col-4 col-md-3 col-lg-2 font-weight-bold">Social link</div>
                    <div class="col-8 col-md-9 col-lg-10">: {{ $event->event_social_link }}</div>
                </div>
                <div class="row pt-3 px-3">
                    <div class="col-4 col-md-3 col-lg-2 font-weight-bold">City</div>
                    <div class="col-8 col-md-9 col-lg-10">: {{ $event->event_location }}</div>
                </div>
                <div class="row pt-3 px-3">
                    <div class="col-4 col-md-3 col-lg-2 font-weight-bold">Location address</div>
                    <div class="col-8 col-md-9 col-lg-10">: {{ $event->event_location_address }}</div>
                </div>
                <div class="row pt-3 px-3">
                    <div class="col-4 col-md-3 col-lg-2 font-weight-bold">Location in map</div>
                    <div class="col-8 col-md-9 col-lg-10" id="map_div">: {!! $event->event_location_map !!}</div>
                </div>
                <div class="row pt-3 px-3">
                    <div class="col-4 col-md-3 col-lg-2 font-weight-bold">Feature image</div>
                    <div class="col-8 col-md-9 col-lg-10">: {{ $event->event_feature_link }}</div>
                </div>
                <div class="row pt-3 px-3">
                    <div class="col-4 col-md-3 col-lg-2 font-weight-bold">Event image</div>
                    <div class="col-8 col-md-9 col-lg-10">: {{ $event->event_image_link }}</div>
                </div>
                <div class="row pt-3 px-3">
                    <div class="col-4 col-md-3 col-lg-2 font-weight-bold">Banner image</div>
                    <div class="col-8 col-md-9 col-lg-10">: {{ $event->event_banner_image_link }}</div>
                </div>
                @php
                    $org_info_arr = $event->getOrganizerInfo($event->organizer_info);
                @endphp
                @if($org_info_arr)
                    @foreach($org_info_arr as $orgIndex => $org)
                        <div class="row pt-3 px-3">
                            <div class="col-4 col-md-3 col-lg-2 font-weight-bold">Organizer {{ $orgIndex }} Name</div>
                            <div class="col-8 col-md-9 col-lg-10">: {{ $org['org_name'] }}</div>
                        </div>
                        <div class="row pt-3 px-3">
                            <div class="col-4 col-md-3 col-lg-2 font-weight-bold">Organizer {{ $orgIndex }} Social Url</div>
                            <div class="col-8 col-md-9 col-lg-10">: {{ $org['org_social_url'] }}</div>
                        </div>
                        <div class="row pt-3 px-3">
                            <div class="col-4 col-md-3 col-lg-2 font-weight-bold">Organizer {{ $orgIndex }} logo</div>
                            <div class="col-8 col-md-9 col-lg-10">: {{ $org['org_social_logo'] }}</div>
                        </div>
                        <div class="row pt-3 px-3">
                            <div class="col-4 col-md-3 col-lg-2 font-weight-bold">Organizer {{ $orgIndex }} address</div>
                            <div class="col-8 col-md-9 col-lg-10">: {{ $org['org_address'] }}</div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
@endsection

@section('js')
    @include('event._partials.script')
@endsection

