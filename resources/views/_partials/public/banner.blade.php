@push('custom-css')
    <style>
        .carousel-item img {
            object-fit: cover;
            width: 100%;
            height: auto;
        }

    </style>
@endpush

<div class="container-fluid p-0">
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @if(count($events) > 0)
                @foreach($events as $event)
                    <div class="carousel-item active">
                        <picture>
                            <source media="(max-width: 375px)" srcset="{{ $event->event_banner_image_link }}">
                            <source media="(max-width: 540px)" srcset="{{ $event->event_banner_image_link }}">
                            <source media="(max-width: 768px)" srcset="{{ $event->event_banner_image_link }}">
                            <source media="(max-width: 1350px)" srcset="{{ $event->event_banner_image_link }}">
                            <img class="d-block w-100" src="{{ $event->event_banner_image_link }}" alt="Third slide">
                        </picture>
                    </div>
                @endforeach
            @else
                <div class="carousel-item">
                    <picture>
                        <source media="(max-width: 375px)" srcset="https://placehold.co/375x200/343434/FFF.png?text=Slider+Three&font=roboto">
                        <source media="(max-width: 540px)" srcset="https://placehold.co/540x300/343434/FFF.png?text=Slider+Three&font=roboto">
                        <source media="(max-width: 768px)" srcset="https://placehold.co/768x300/343434/FFF.png?text=Slider+Three&font=roboto">
                        <source media="(max-width: 1350px)" srcset="https://placehold.co/1350x300/343434/FFF.png?text=Slider+Three&font=roboto">
                        <img class="d-block w-100" src="https://placehold.co/1350x300/343434/FFF.png?text=Slider+Three&font=roboto" alt="Third slide">
                    </picture>
                </div>
            @endif
        </div>
        @if(count($events) > 1)
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        @endif
    </div>
</div>



@push('scripts')
    <script>
        const myCarouselElement = document.querySelector('.carousel')

        const carousel = new bootstrap.Carousel(myCarouselElement, {
            interval: 2000,
            touch: false
        })
    </script>
@endpush
