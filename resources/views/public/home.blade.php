@extends('layouts.public')

@section('content')
    @include('_partials.public.banner')
    <div class="container-fluid p-0 bg-light">
        <div class="album py-5">
            <div class="container">
                @if(count($events) > 0)
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                        @foreach($events as $event)
                            <div class="col">
                                <div class="card shadow-sm">
                                    {{--<picture>
                                        <source media="(max-width: 540px)" srcset="https://placehold.co/540x300/343434/FFF.webp">
                                        <source media="(max-width: 768px)" srcset="https://placehold.co/450x300/343434/FFF.webp">
                                        <source media="(max-width: 1350px)" srcset="https://placehold.co/450x250/343434/FFF.webp">
                                        <img class="d-block w-100" src="https://placehold.co/450x250/343434/FFF.webp" alt="First slide">
                                    </picture>--}}
                                    <img class="d-block w-100" src="{{ $event->event_image_link }}" alt="{{ $event->name . " image" }}">

                                    <div class="card-body">
                                        {!! $event->short_desc !!}
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <a href="{{ url('/'. $event->slug.'/details') }}" class="btn btn-sm btn-outline-secondary">View Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="col text-center">
                        <p class="card-text">No events found.</p>
                    </div>
                @endif
            </div>
        </div>

    </div>
@endsection
