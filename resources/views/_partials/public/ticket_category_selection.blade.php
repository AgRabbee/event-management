<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-5 justify-content-center mt-5 mb-3">
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

                        <select name="ticket_count[{{ $package_index }}]"
                                id="ticket_count_{{ $package_index }}"
                                class="form-control custom-select category_selection @error('ticket_count.' . $package_index) is-invalid @enderror"
                                data-package-index="{{ $package_index }}"
                                data-category="{{ $package['category_name'] }}">
                            <option value="">Select No. of Tickets</option>
                            @for($i = 1; $i <= $package['ticket_sell_options']; $i++)
                                <option value="{{ $i }}" {{ old('ticket_count.' . $package_index) == $i ? 'selected' : '' }}>
                                    {{ $i }}
                                </option>
                            @endfor
                        </select>

                        {{-- Display error message if validation fails --}}
                        @error('ticket_count.' . $package_index)
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
        @endforeach
        {{-- Hidden input to store the selected category index --}}
        <input type="hidden" id="selected_category" name="selected_category" value="{{ old('selected_category') }}">
    @endif
</div>
<p class="text-center text-danger m-0">Note: You can only select one category for each purchase.</p>
