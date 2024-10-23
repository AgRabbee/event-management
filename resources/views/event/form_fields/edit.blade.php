@extends('layouts.admin')

@section('title','Event Edit')

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
                <div class="card-header bg-olive">Edit Event Form</div>

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
                    {{--                    {{ dd($form_fields) }}--}}
                    <div class="card-body">
                        <div class="row">
                            @foreach($form_fields as $info_index=>$form_field)
                                <div class="col-md-12" id="accordion_{{$info_index}}">
                                    <div class="card card-secondary card-outline">
                                        <a class="d-block w-100" data-toggle="collapse" href="#{{$info_index}}_section" aria-expanded="true">
                                            <div class="card-header">
                                                <h4 class="card-title w-100">
                                                    {{ ucwords(str_replace('_', ' ', $info_index)) }} Section
                                                </h4>
                                            </div>
                                        </a>

                                        <div id="{{$info_index}}_section" data-type="{{$info_index}}" class="collapse" data-parent="#accordion_{{$info_index}}">
                                            <div class="card-body">
                                                @foreach($form_field as $row_index => $row_field)
                                                    <div class="row form_row" id="form_row_{{$row_index}}">
                                                        <div class="col-md-12 p-0" id="{{$info_index}}_section_accordion_{{$row_index}}">
                                                            <div class="card card-secondary card-outline">
                                                                <a class="d-block w-100" data-toggle="collapse" href="#{{$info_index}}_section_row_{{$row_index}}" aria-expanded="true">
                                                                    <div class="card-header">
                                                                        <h4 class="card-title w-100">
                                                                            Row no: {{$row_index}}
                                                                        </h4>
                                                                    </div>
                                                                </a>
                                                                <div id="{{$info_index}}_section_row_{{$row_index}}" class="collapse" data-parent="#{{$info_index}}_section_accordion_{{$row_index}}">
                                                                    <div class="card-body">
                                                                        <div class="row">
                                                                            <div class="col-sm-12 col-md-12">
                                                                                {{-- Grid selection --}}
                                                                                <div class="col-sm-3 col-md-3 p-0">
                                                                                    <div class="form-group">
                                                                                        <label>No of column in a row<span class="text-danger">*</span></label>
                                                                                        <select class="form-control custom-select" id="grid_selection">
                                                                                            <option>-- Select One --</option>
                                                                                            <option value="1" {{ count($row_field) == 1 ? 'selected' : '' }}>1</option>
                                                                                            <option value="2" {{ count($row_field) == 2 ? 'selected' : '' }}>2</option>
                                                                                            <option value="3" {{ count($row_field) == 3 ? 'selected' : '' }}>3</option>
                                                                                            <option value="4" {{ count($row_field) == 4 ? 'selected' : '' }}>4</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row" id="form_fields">
                                                                            @php
                                                                                if (count($row_field) == 1) {
                                                                                    $classText = 'col-sm-12 col-md-12';
                                                                                } else if (count($row_field) == 2) {
                                                                                    $classText = 'col-sm-6 col-md-6';
                                                                                } else if (count($row_field) == 3) {
                                                                                    $classText = 'col-sm-4 col-md-4';
                                                                                } else if (count($row_field) == 4) {
                                                                                    $classText = 'col-sm-3 col-md-3';
                                                                                }
                                                                            @endphp
                                                                            @foreach($row_field as $section_index=> $section_field)
                                                                                <div class="custom-box {{$classText}}" id="section_no_{{ $section_index }}" data-prevData="{{ json_encode($section_field) }}">
                                                                                    <div class="form-group">
                                                                                        <label>Input Type<span class="text-danger">*</span></label>
                                                                                        <select class="form-control custom-select input_selection" name="{{$info_index}}[{{$row_index}}][{{ $section_index }}][input_type]">
                                                                                            <option value="">-- Select One --</option>
                                                                                            <option value="text" {{ isset($section_field['type']) && $section_field['type'] == 'text' ? 'selected' : '' }}>Text</option>
                                                                                            <option value="email" {{ isset($section_field['type']) && $section_field['type'] == 'email' ? 'selected' : '' }}>Email</option>
                                                                                            <option value="number" {{ isset($section_field['type']) && $section_field['type'] == 'number' ? 'selected' : '' }}>Number
                                                                                            </option>
                                                                                            <option value="date" {{ isset($section_field['type']) && $section_field['type'] == 'date' ? 'selected' : '' }}>Date</option>
                                                                                            <option value="radio" {{ isset($section_field['type']) && $section_field['type'] == 'radio' ? 'selected' : '' }}>Radio</option>
                                                                                            <option value="checkbox" {{ isset($section_field['type']) && $section_field['type'] == 'checkbox' ? 'selected' : '' }}>
                                                                                                Checkbox
                                                                                            </option>
                                                                                            <option value="textarea" {{ isset($section_field['type']) && $section_field['type'] == 'textarea' ? 'selected' : '' }}>
                                                                                                Textarea
                                                                                            </option>
                                                                                            <option value="dropdown" {{ isset($section_field['type']) && $section_field['type'] == 'dropdown' ? 'selected' : '' }}>
                                                                                                Dropdown
                                                                                            </option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <span class="field_info_section" id="section_{{ $section_index }}">
                                                                                        @if(isset($section_field['type']))
                                                                                            @include('event.form_fields.field_info_with_old_value')
                                                                                        @endif
                                                                                    </span>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <button type="button" class="btn btn-sm btn-success add_row ml-3 mb-3">Need Another row?</button>
                                        </div>
                                    </div>

                                </div>
                            @endforeach
                        </div>

                        <div class="row mt-3">
                            <div class="col-sm-12 col-md-12 text-center">
                                <a href="{{ route('events.show', $event->slug) }}" class="btn btn-sm btn-default">Close</a>
                                <button type="submit" class="btn btn-sm btn-primary">Update</button>
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

