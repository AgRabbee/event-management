@extends('layouts.admin')

@section('title','Event')

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
                <div class="card-header bg-olive">
                    <a href="{{ route('events.create') }}" class="btn bg-gradient-success btn-xs float-right create-btn"><i class="fa fa-plus"></i> Create</a>
                </div>

                <div class="card-body" id="event-list-display"></div>
                <div class="overlay" id="loading_overlay">
                    <i class="fas fa-2x fa-sync-alt fa-spin text-olive"></i>
                </div>
            </div>
        </div>
    </section>
    @include('event._partials.modal')
@endsection

@section('js')
    @include('event._partials.script')
@endsection

