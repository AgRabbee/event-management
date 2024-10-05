@extends('layouts.admin')

@section('title','Food Item')

@section('admin-custom-css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}">

    <style>
        #event-list td:nth-child(2) {
            width: 8%;
        }

        #event-list td:nth-child(6) {
            width: 8%;
        }

        #event-list td:last-child {
            width: 12%;
            text-align: center;
        }
    </style>
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">

            <div class="card border border-olive">
                <div class="card-header bg-olive">Create Event</div>

                {{-- Displaying the validation errors --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card-body">
                    <form action="{{ route('events.store') }}" method="post">
                        @csrf
                        <div class="row">
                            {{-- Event Name --}}
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="name">Name<span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control form-control-sm" id="name" maxlength="100" aria-labelledby="event_name" placeholder="Enter name" value="{{ old('name') }}">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <small class="form-text text-muted" id="event_name">Name should be max 100 characters</small>
                                </div>
                            </div>

                            {{-- Event Short Description --}}
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="short_desc">Short Description<span class="text-danger">*</span></label>
                                    <textarea name="short_desc" class="form-control form-control-sm textarea short-textarea no-resize" id="short_desc" maxlength="100" cols="30" rows="1">{{ old('short_desc') }}</textarea>
                                    @error('short_desc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <small class="form-text text-muted" id="event_name">Short Description should be max 250 characters</small>
                                </div>
                            </div>

                            {{-- Event Long Description --}}
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="long_desc">Description<span class="text-danger">*</span></label>
                                    <textarea name="long_desc" class="form-control form-control-sm textarea" id="long_desc" cols="30" rows="3">{{ old('long_desc') }}</textarea>
                                    @error('long_desc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Event From --}}
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label for="event_from">Event From<span class="text-danger">*</span></label>
                                    <div class="input-group date date-selection" id="event_from" data-target-input="nearest">
                                        <input type="text" name="event_from" class="form-control form-control-sm datetimepicker-input" data-target="#event_from" value="{{ old('event_from') }}">
                                        <div class="input-group-append" data-target="#event_from" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                    @error('event_from')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Event To --}}
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label for="event_to">Event To<span class="text-danger">*</span></label>
                                    <div class="input-group date date-selection" id="event_to" data-target-input="nearest">
                                        <input type="text" name="event_to" class="form-control form-control-sm datetimepicker-input" data-target="#event_to" value="{{ old('event_to') }}">
                                        <div class="input-group-append" data-target="#event_to" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                    @error('event_to')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Ticket Available Till --}}
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label for="ticket_available_till">Ticket Available Till<span class="text-danger">*</span></label>
                                    <div class="input-group date date-selection" id="ticket_available_till" data-target-input="nearest">
                                        <input type="text" name="ticket_available_till" class="form-control form-control-sm datetimepicker-input" data-target="#ticket_available_till"
                                               value="{{ old('ticket_available_till') }}">
                                        <div class="input-group-append" data-target="#ticket_available_till" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                    @error('ticket_available_till')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Event Social Link --}}
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="event_social_link">Event Social Link<span class="text-danger">*</span></label>
                                    <input type="text" name="event_social_link" class="form-control form-control-sm" id="event_social_link" placeholder="http://..." value="{{ old('event_social_link') }}">
                                    @error('event_social_link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Event Location --}}
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label for="event_location">Event Location<span class="text-danger">*</span></label>
                                    <input type="text" name="event_location" class="form-control form-control-sm" id="event_location" placeholder="Enter event location" value="{{ old('event_location') }}">
                                    @error('event_location')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Event Location Address --}}
                            <div class="col-sm-12 col-md-8">
                                <div class="form-group">
                                    <label for="event_location_address">Event Location Address<span class="text-danger">*</span></label>
                                    <input type="text" name="event_location_address" class="form-control form-control-sm" id="event_location_address" placeholder="Enter event location address"
                                           value="{{ old('event_location_address') }}">
                                    @error('event_location_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Event Location Map --}}
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="event_location_map">Event Location in Map<span class="text-danger">*</span></label>
                                    <textarea name="event_location_map" class="form-control form-control-sm" id="event_location_map" cols="30" rows="3"
                                              placeholder="Enter embedded html here...">{{ old('event_location_map') }}</textarea>
                                    @error('event_location_map')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Event Feature Image Link --}}
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label for="event_feature_link">Feature Image Link<span class="text-danger">*</span></label>
                                    <input type="text" name="event_feature_link" class="form-control form-control-sm" id="event_feature_link" aria-describedby="feature_image_link" placeholder="https://"
                                           value="{{ old('event_feature_link') }}">
                                    @error('event_feature_link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <small class="form-text text-muted" id="feature_image_link">Feature Image resolution should be 600x450 px</small>
                                </div>
                            </div>

                            {{-- Event Image Link --}}
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label for="event_image_link">Image Link<span class="text-danger">*</span></label>
                                    <input type="text" name="event_image_link" class="form-control form-control-sm" id="event_image_link" aria-describedby="image_link" placeholder="https://"
                                           value="{{ old('event_image_link') }}">
                                    @error('event_image_link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <small class="form-text text-muted" id="image_link">Image resolution should be 450x250 px</small>
                                </div>
                            </div>

                            {{-- Event Banner Image Link --}}
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label for="event_banner_image_link">Banner Image Link<span class="text-danger">*</span></label>
                                    <input type="text" name="event_banner_image_link" class="form-control form-control-sm" id="event_banner_image_link" aria-describedby="banner_image_link" placeholder="https://"
                                           value="{{ old('event_banner_image_link') }}">
                                    @error('event_banner_image_link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <small class="form-text text-muted" id="banner_image_link">Banner image resolution should be 1350x291 px</small>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <h5 class="text-center">Organizer Info</h5>
                        <hr>

                        <div class="row p-0">
                            <button class="btn btn-outline-info ml-auto btn-sm mr-2" id="add-organizer-btn">Add Organizer</button>
                            <div class="row col-sm-12 col-md-12 pr-0" id="organizer_1">
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="org_name_1">Organizer Name<span class="text-danger">*</span></label>
                                        <input type="text" name="organizer_info[1][org_name]" class="form-control form-control-sm" id="org_name_1" placeholder="Enter organizer name"
                                               value="{{ old('organizer_info.1.org_name') }}">
                                        @error('organizer_info.1.org_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="org_social_url_1">Organizer Social Link<span class="text-danger">*</span></label>
                                        <input type="text" name="organizer_info[1][org_social_url]" class="form-control form-control-sm" id="org_social_url_1" placeholder="Enter organizer url"
                                               value="{{ old('organizer_info.1.org_social_url') }}">
                                        @error('organizer_info.1.org_social_url')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="org_social_logo_1">Organizer Logo<span class="text-danger">*</span></label>
                                        <input type="text" name="organizer_info[1][org_social_logo]" class="form-control form-control-sm" id="org_social_logo_1" placeholder="Enter organizer logo url"
                                               value="{{ old('organizer_info.1.org_social_logo') }}">
                                        @error('organizer_info.1.org_social_logo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="org_address_1">Organizer Address<span class="text-danger">*</span></label>
                                        <input type="text" name="organizer_info[1][org_address]" class="form-control form-control-sm" id="org_address_1" placeholder="Enter organizer address"
                                               value="{{ old('organizer_info.1.org_address') }}">
                                        @error('organizer_info.1.org_address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-12 text-center">
                                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-sm btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
@endsection

@section('js')
    @include('event._partials.script')
@endsection

