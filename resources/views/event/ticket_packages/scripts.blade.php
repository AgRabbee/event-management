<script>
    $(document).on('click', '.add_category', function () {

        let parentObj = $(this).siblings('.card-body');
        let lastRow = parentObj.children().last();
        let lastRowId = lastRow.attr('id');
        let lastRowNo = lastRowId ? lastRow.attr('id').split('_')[1] : 0;
        let newRowId = parseInt(lastRowNo) + 1;
        let htmlObj = `
        <div class="ticket_package" id="package_${newRowId}">
                            <div class="d-flex justify-content-between">
                            <h5>Category ${newRowId}</h5>
                            <button type="button" class="btn btn-sm btn-outline-danger remove_category" data-toggle="tooltip" data-placement="bottom"
                                title="Remove this row">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-square" viewBox="0 0 16 16">
                                  <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                                  <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8"/>
                                </svg>
                            </button>
                            </div>
                            <hr class="mt-1 mb-2">
                            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3" >
                                <div class="col form-group">
                                    <label for="category_name_${newRowId}">Category Name<span class="text-danger">*</span></label>
                                    <input type="text" name="ticket_package[${newRowId}][category_name]" class="form-control form-control-sm" id="category_name_${newRowId}" placeholder="Enter Category Name">
                                   ${'@error("category_name.' + newRowId + '")'}
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                ${'@enderror'}
        </div>

        <div class="col form-group">
            <label for="ticket_limit_${newRowId}">Ticket Limit<span class="text-danger">*</span></label>
            <input type="number" name="ticket_package[${newRowId}][ticket_limit]" class="form-control form-control-sm" id="ticket_limit_${newRowId}" placeholder="Enter Ticket Limit" min="1">
        ${'@error("ticket_limit.' + newRowId + '")'}
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                ${'@enderror'}
        </div>

        <div class="col form-group">
            <label for="ticket_price_${newRowId}">Ticket Price<span class="text-danger">*</span></label>
            <input type="number" name="ticket_package[${newRowId}][ticket_price]" class="form-control form-control-sm" id="ticket_price_${newRowId}" placeholder="Enter Ticket Price" min="1">
        ${'@error("ticket_price.' + newRowId + '")'}
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                ${'@enderror'}
        </div>

        <div class="col form-group">
            <label for="ticket_discount_price_${newRowId}">Ticket Discount Price<span class="text-danger">*</span></label>
            <input type="number" name="ticket_package[${newRowId}][ticket_discount_price]" class="form-control form-control-sm" id="ticket_discount_price_${newRowId}" aria-labelledby="ticket_discount_price_${newRowId}"
              placeholder="Enter
            Ticket Discount Price"
            min="1">
            <small class="form-text text-muted" id="ticket_discount_price_${newRowId}">Enter ticket price after applying the discount</small>
        ${'@error("ticket_discount_price.' + newRowId + '")'}
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                ${'@enderror'}
        </div>

        <div class="col form-group">
            <label for="ticket_sell_options_${newRowId}">Ticket sell options<span class="text-danger">*</span></label>
            <input type="number" name="ticket_package[${newRowId}][ticket_sell_options]" class="form-control form-control-sm" id="ticket_sell_options_${newRowId}" placeholder="Enter Ticket sell options" min="1" max="5">
        ${'@error("ticket_sell_options.' + newRowId + '")'}
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                ${'@enderror'}
        </div>

        <div class="col form-group">
            <label for="additional_info_${newRowId}">Additional Info</label>
            <input type="text" name="ticket_package[${newRowId}][additional_info]" class="form-control form-control-sm" id="additional_info_${newRowId}" placeholder="Enter Additional Info">
        ${'@error("additional_info.' + newRowId + '")'}
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                ${'@enderror'}
        </div>

        <div class="col form-group">
            <label for="available_from_${newRowId}">Available From</label>
            <input type="date" name="ticket_package[${newRowId}][available_from]" class="form-control form-control-sm" id="available_from_${newRowId}">
            ${'@error("available_from.' + newRowId + '")'}
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        ${'@enderror'}
        </div>

        <div class="col form-group">
            <label for="valid_till_${newRowId}">valid till</label>
            <input type="date" name="ticket_package[${newRowId}][valid_till]" class="form-control form-control-sm" id="valid_till_${newRowId}">
            ${'@error("valid_till.' + newRowId + '")'}
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        ${'@enderror'}
        </div>
    </div>
</div>
`;
        parentObj.append(htmlObj);
    });

    $(document).on('click', '.remove_category', function () {
        $(this).closest('.ticket_package').remove();
    });
</script>
