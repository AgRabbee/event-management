@extends('layouts.admin')

@section('title','Event Ticket Package Create')

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
                <div class="card-header bg-olive">Add Event Ticket Package(s)</div>

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
                        <div class="ticket_package" id="package_1">
                            <div class="d-flex justify-content-between">
                                <h5>Category 1</h5>
                            </div>
                            <hr class="mt-1 mb-2">
                            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                                <div class="col form-group">
                                    <label for="category_name_1">Category Name<span class="text-danger">*</span></label>
                                    <input type="text" name="ticket_package[1][category_name]" class="form-control form-control-sm" id="category_name_1" placeholder="Enter Category Name">
                                    @error("category_name.1")
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>

                                <div class="col form-group">
                                    <label for="ticket_limit_1">Ticket Limit<span class="text-danger">*</span></label>
                                    <input type="number" name="ticket_package[1][ticket_limit]" class="form-control form-control-sm" id="ticket_limit_1" placeholder="Enter Ticket Limit" min="1">
                                    @error("ticket_limit.1")
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>

                                <div class="col form-group">
                                    <label for="ticket_price_1">Ticket Price<span class="text-danger">*</span></label>
                                    <input type="number" name="ticket_package[1][ticket_price]" class="form-control form-control-sm" id="ticket_price_1" placeholder="Enter Ticket Price" min="1">
                                    @error("ticket_price.1")
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>

                                <div class="col form-group">
                                    <label for="ticket_discount_price_1">Ticket Discount Price<span class="text-danger">*</span></label>
                                    <input type="number" name="ticket_package[1][ticket_discount_price]" class="form-control form-control-sm" id="ticket_discount_price_1" aria-labelledby="ticket_discount_price_1"
                                           placeholder="Enter Ticket Discount Price" min="1">
                                    <small class="form-text text-muted" id="ticket_discount_price_1">Enter ticket price after applying the discount</small>
                                    @error("ticket_discount_price.1")
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>

                                <div class="col form-group">
                                    <label for="ticket_sell_options_1">Ticket sell options<span class="text-danger">*</span></label>
                                    <input type="number" name="ticket_package[1][ticket_sell_options]" class="form-control form-control-sm" id="ticket_sell_options_1" placeholder="Enter Ticket sell options" min="1" max="5">
                                    @error("ticket_sell_options.1")
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>

                                <div class="col form-group">
                                    <label for="additional_info_1">Additional Info</label>
                                    <input type="text" name="ticket_package[1][additional_info]" class="form-control form-control-sm" id="additional_info_1" placeholder="Enter Additional Info">
                                    @error("additional_info.1")
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>

                                <div class="col form-group">
                                    <label for="available_from_1">Available From</label>
                                    <input type="date" name="ticket_package[1][available_from]" class="form-control form-control-sm" id="available_from_1">
                                    @error("available_from.1")
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>

                                <div class="col form-group">
                                    <label for="valid_till_1">valid till</label>
                                    <input type="date" name="ticket_package[1][valid_till]" class="form-control form-control-sm" id="valid_till_1">
                                    @error("valid_till.1")
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>

                            </div>
                        </div>
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

