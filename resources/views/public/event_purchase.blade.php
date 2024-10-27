@extends('layouts.public')

@push('custom-css')
    <style>
        .price-amount {
            font-size: 1.5rem;
            font-weight: bold;
            background: #6A9C89;
            color: #16423C;
            padding: 5px 16px 5px 5px;
            width: 100px;
            margin: 8px auto 16px;
            border-radius: 10px;
        }

        .form-control {
            padding: 6px 15px;
            line-height: 1;
            font-size: 16px;
        }
    </style>
@endpush

@section('content')
    {{--@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif--}}
    <form action="{{ route("event.proceedToPayment",$event_slug) }}" method="post">
        <div class="container-fluid">
            <div class="custom-container px-5 py-3 album">
                @csrf
                <h3>Ticket Details</h3>
                <hr class="mt-1 mb-2">
                @include('_partials.public.ticket_category_selection')
            </div>
        </div>

        <div class="container-fluid bg-light">
            <div class="custom-container p-5 pb-3 album">
                <h3>Customer Details</h3>
                <hr class="mt-1 mb-2">
                <div class="row row-cols-1 row-cols-sm-2">
                    <div class="col-md-8 col-sm-12 p-0 border-end">
                        @include('_partials.public.customer_details_form')
                    </div>

                    <div class="col-md-4 col-sm-12">
                        @include('_partials.public.event_details')
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid bg-light">
            <div class="custom-container px-5 py-3 album border-top">
                <div class="container pb-5 pt-2 text-center">
                    <button type="submit" class="btn btn-success px-5">Proceed to Payment</button>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $('.category_selection').on('change', function() {
                let selectedValue = $(this).val();
                let currentCategory = $(this).data('category');

                $('#selected_category').val(currentCategory);

                if (selectedValue) {
                    $('.category_selection').not(this).prop('disabled', true);
                } else {
                    $('.category_selection').prop('disabled', false);
                }
            });
        });
    </script>
@endpush
