@extends('layouts.admin')

@section('title','Event Ticket Package Edit')

@section('admin-custom-css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}">

    <style>
        .card-header {
            padding: 8px 15px;
            min-height: 40px !important;
        }

        .card-title {
            font-size: 18px;
            color: #333;
        }

        .form-control {
            font-size: 14px;
            padding: 5px 8px;
            height: 35px;
        }

        .form-group label {
            font-size: 16px;
        }

        #form_fields {
            padding: 0 7px;
        }

        .custom-box {
            min-height: 200px;
            border: 1px dashed #999;
            padding: 10px;
            border-radius: 5px;
        }

        .option-table tr th, .option-table tr td {
            font-size: 13px;
        }

        .option-table td {
            padding: 2px !important;
        }

        .option-table .form-control {
            padding: 2px;
            font-size: 13px;
            height: 35px;
        }
    </style>
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">

            <div class="card border border-olive">
                <div class="card-header bg-olive">Edit Event Ticket Packages</div>

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

                <form action="{{ route('events.ticketPackagesUpdate', $event->slug) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        @foreach($ticket_packages as $info_index=>$ticket_package)
                            <div class="ticket_package" id="package_{{$info_index}}">
                                <div class="d-flex justify-content-between">
                                    <h5>Category {{$info_index}}</h5>

                                    @if($info_index > 1)
                                        <button type="button" class="btn btn-sm btn-outline-danger remove_category" data-toggle="tooltip" data-placement="bottom"
                                                title="Remove this row">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-square" viewBox="0 0 16 16">
                                                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                                                <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8"/>
                                            </svg>
                                        </button>
                                    @endif

                                </div>
                                <hr class="mt-1 mb-2">
                                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                                    <div class="col form-group">
                                        <label for="category_name_{{$info_index}}">Category Name<span class="text-danger">*</span></label>
                                        <input type="text" name="ticket_package[{{ $info_index }}][category_name]" class="form-control form-control-sm"
                                               value="{{ old( 'ticket_package.'.$info_index.'.category_name',$ticket_package['category_name'])}}"
                                               id="category_name_{{$info_index}}" placeholder="Enter Category Name">
                                        @error("ticket_package.".$info_index."category_name")
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col form-group">
                                        <label for="ticket_limit_{{$info_index}}">Ticket Limit<span class="text-danger">*</span></label>
                                        <input type="number" name="ticket_package[{{ $info_index }}][ticket_limit]" class="form-control form-control-sm"
                                               value="{{ old( 'ticket_package.'.$info_index.'.ticket_limit', $ticket_package['ticket_limit']) }}"
                                               id="ticket_limit_{{$info_index}}" placeholder="Enter Ticket Limit" min="1">
                                        @error("ticket_package.".$info_index."ticket_limit")
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col form-group">
                                        <label for="ticket_price_{{$info_index}}">Ticket Price<span class="text-danger">*</span></label>
                                        <input type="number" name="ticket_package[{{ $info_index }}][ticket_price]" class="form-control form-control-sm"
                                               value="{{ old( 'ticket_package.'.$info_index.'.ticket_price', $ticket_package['ticket_price']) }}"
                                               id="ticket_price_{{$info_index}}" placeholder="Enter Ticket Price" min="1">
                                        @error("ticket_package.".$info_index."ticket_price")
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col form-group">
                                        <label for="ticket_discount_price_{{$info_index}}">Ticket Discount Price<span class="text-danger">*</span></label>
                                        <input type="number" name="ticket_package[{{ $info_index }}][ticket_discount_price]" class="form-control form-control-sm"
                                               value="{{ old( 'ticket_package.'.$info_index.'.ticket_discount_price', $ticket_package['ticket_discount_price']) }}"
                                               id="ticket_discount_price_{{$info_index}}" aria-labelledby="ticket_discount_price_{{$info_index}}" placeholder="Enter Ticket Discount Price" min="1">
                                        <small class="form-text text-muted" id="ticket_discount_price_{{$info_index}}">Enter ticket price after applying the discount</small>
                                        @error("ticket_package.".$info_index."ticket_discount_price")
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col form-group">
                                        <label for="ticket_sell_options_{{$info_index}}">Ticket sell options<span class="text-danger">*</span></label>
                                        <input type="number" name="ticket_package[{{ $info_index }}][ticket_sell_options]" class="form-control form-control-sm"
                                               value="{{ old( 'ticket_package.'.$info_index.'.ticket_sell_options', $ticket_package['ticket_sell_options']) }}"
                                               id="ticket_sell_options_{{$info_index}}" placeholder="Enter Ticket sell options" min="1">
                                        @error("ticket_package.".$info_index."ticket_sell_options")
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col form-group">
                                        <label for="additional_info_{{$info_index}}">Additional Info</label>
                                        <input type="text" name="ticket_package[{{ $info_index }}][additional_info]" class="form-control form-control-sm"
                                               value="{{ old( 'ticket_package.'.$info_index.'.additional_info', $ticket_package['additional_info']) }}"
                                               id="additional_info_{{$info_index}}" placeholder="Enter Additional Info">
                                        @error("ticket_package.".$info_index."additional_info")
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col form-group">
                                        <label for="available_from_{{$info_index}}">Available From</label>
                                        <input type="date" name="ticket_package[{{ $info_index }}][available_from]" class="form-control form-control-sm"
                                               value="{{ old( 'ticket_package.'.$info_index.'.available_from', $ticket_package['available_from']) }}" id="available_from_{{$info_index}}">
                                        @error("ticket_package.".$info_index."available_from")
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col form-group">
                                        <label for="valid_till_{{$info_index}}">valid till</label>
                                        <input type="date" name="ticket_package[{{ $info_index }}][valid_till]" class="form-control form-control-sm"
                                               value="{{ old( 'ticket_package.'.$info_index.'.valid_till', $ticket_package['valid_till']) }}" id="valid_till_{{$info_index}}">
                                        @error("ticket_package.".$info_index."valid_till")
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>

                    <button type="button" class="btn btn-sm btn-success add_category ml-3 mb-3">Need Another category?</button>

                    <div class="row m-3">
                        <div class="col-sm-12 col-md-12 text-center">
                            <a href="{{ route('events.show', $event->slug) }}" class="btn btn-sm btn-default">Close</a>
                            <button type="submit" class="btn btn-sm btn-primary">Store</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('js')
    @include('event.ticket_packages.scripts')
@endsection

