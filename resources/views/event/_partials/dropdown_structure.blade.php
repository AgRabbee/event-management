<div class="form-group mb-3">
    <label class="mb-1" for="label">Label <span class="text-danger">*</span></label>
    <input type="text" class="form-control required-field" id="label" name="{{ $dataType . '[' . $rowNo . '][' . $sectionNo . '][label]'}}" placeholder="Enter your label">
</div>
<div class="form-group mb-3">
    <label class="mb-1" for="custom_id">Custom ID</label>
    <input type="text" class="form-control" id="custom_id" name="{{$dataType . '[' . $rowNo . '][' . $sectionNo . '][custom_id]'}}" placeholder="Enter your custom ID">
</div>
<div class="form-group mb-3">
    <label class="mb-1" for="custom_classes">Custom Class(s)</label>
    <input type="text" class="form-control" id="custom_classes" name="{{ $dataType . '[' . $rowNo . '][' . $sectionNo . '][custom_classes]'}}" aria-labelledby="custom_classes_hlp"
           placeholder="Enter your custom class(s)">
    <small class="form-text text-muted" id="custom_classes_hlp">Multiple classes should be comma separated</small>
</div>
<div class="form-group mb-3">
    <label class="mb-1" for="custom_id">Will it be required? <span class="text-danger">*</span></label>
    <div class="form-check">
        <input class="form-check-input required-field" name="{{ $dataType . '[' . $rowNo . '][' . $sectionNo . '][is_required]'}}" type="checkbox" value="1">
        <label class="form-check-label">Yes</label>
    </div>
</div>
<div class="form-group mb-3">
    <label class="mb-1" for="err_msg">Error Message</label>
    <input type="text" class="form-control required-field" id="err_msg" name="{{ $dataType . '[' . $rowNo . '][' . $sectionNo . '][err_msg]'}}" placeholder="Enter your custom error message">
</div>

<h5>Options</h5>
<hr class="mt-1 mb-2">
<div>
    <table class="table table-bordered table-sm option-table">
        <tr>
            <th class="text-center">#SL</th>
            <th>Label</th>
            <th>Value</th>
            <th>Action</th>
        </tr>
        <tr id="row_1">
            <td class="text-center">1</td>
            <td>
                <input type="text" class="form-control required-field" name="{{ $dataType . '[' . $rowNo . '][' . $sectionNo . '][opt][1][label]' }}">
            </td>
            <td>
                <input type="text" class="form-control required-field" name="{{ $dataType . '[' . $rowNo . '][' . $sectionNo . '][opt][1][value]' }}">
            </td>
            <td>
                <button type="button" class="btn btn-sm btn-outline-secondary add_more_select_option" data-toggle="tooltip" data-placement="bottom" title="Add more option">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                        <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                    </svg>
                </button>
            </td>
        </tr>

    </table>
</div>
