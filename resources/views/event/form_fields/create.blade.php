@extends('layouts.admin')

@section('title','Event Create')

@section('admin-custom-css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}">

    <style>
        .card-header{
            padding: 8px 15px;
            min-height: 40px !important;
        }

        .card-title{
            font-size: 18px;
            color: #333;
        }

        .form-control{
            font-size: 14px;
            padding: 5px 8px;
            height: 35px;
        }
        .form-group label{
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
        .option-table tr th, .option-table tr td{
            font-size: 13px;
        }

        .option-table td{
            padding: 2px !important;
        }

        .option-table .form-control{
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
                <div class="card-header bg-olive">Create Event Form</div>

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
                <form action="{{ route('events.formFieldsUpdate', $event->slug) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12" id="accordion">
                                <div class="card card-secondary card-outline">
                                    <a class="d-block w-100" data-toggle="collapse" href="#customer_info_section" aria-expanded="true">
                                        <div class="card-header">
                                            <h4 class="card-title w-100">
                                                Customer Information Section
                                            </h4>
                                        </div>
                                    </a>
                                    <div id="customer_info_section" data-type="customer_info" class="collapse show" data-parent="#accordion" style="">
                                        <div class="card-body">
                                            <div class="row form_row" id="form_row_1">
                                                <div class="col-md-12 p-0" id="customer_info_section_accordion_1">
                                                    <div class="card card-secondary card-outline">
                                                        <a class="d-block w-100" data-toggle="collapse" href="#customer_info_section_row_1" aria-expanded="true">
                                                            <div class="card-header">
                                                                <h4 class="card-title w-100">
                                                                    Row no: 1
                                                                </h4>
                                                            </div>
                                                        </a>
                                                        <div id="customer_info_section_row_1" class="collapse show" data-parent="#customer_info_section_accordion_1" style="">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-sm-12 col-md-12">
                                                                        {{-- Grid selection --}}
                                                                        <div class="col-sm-3 col-md-3 p-0">
                                                                            <div class="form-group">
                                                                                <label>No of column in a row<span class="text-danger">*</span></label>
                                                                                <select class="form-control custom-select" id="grid_selection">
                                                                                    <option>-- Select One --</option>
                                                                                    <option value="1">1</option>
                                                                                    <option value="2">2</option>
                                                                                    <option value="3">3</option>
                                                                                    <option value="4">4</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row" id="form_fields"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-sm btn-success add_row ml-3 mb-3">Need Another row?</button>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-sm-12 col-md-12 text-center">
                                <a href="{{ route('events.show', $event->slug) }}" class="btn btn-sm btn-default">Close</a>
                                <button type="submit" class="btn btn-sm btn-primary">Store</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('js')
    @include('event._partials.script')
@endsection

