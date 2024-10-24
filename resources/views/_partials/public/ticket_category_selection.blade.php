<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-5 justify-content-center my-5">
    @if(count($ticket_packages) > 0)
        @foreach($ticket_packages as $package_index => $package)
            <div class="col mt-0">
                <div class="card shadow-sm text-center px-2 py-3">
                    <div class="card-body">
                        <h5 class="card-title fw-bolder">{{ $package['category_name'] }}</h5>
                        <small>{{ $package['additional_info'] ?? '' }}</small>

                        @if(empty($package['ticket_discount_price']))
                            <p class="card-text price-amount">
                                ৳ {{ $package['ticket_price'] }}
                            </p>
                        @else
                            <p class="text-decoration-line-through text-muted mb-0 mt-3">৳ {{ $package['ticket_price'] }}</p>
                            <p class="card-text price-amount">
                                ৳ {{ $package['ticket_discount_price'] }}
                            </p>
                        @endif

                        <select name="ticket_count" id="ticket_count" class="form-control custom-select">
                            <option value="">Select No. of Tickets</option>
                            @for($i=1; $i<=$package['ticket_sell_options']; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>
