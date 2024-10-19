<div class="form-group mb-3">
    <label class="mb-1" for="label">Label <span class="text-danger">*</span></label>
    <input type="text" class="form-control required-field" id="label" name="{{ $dataType . '[' . $rowNo . '][' . $sectionNo . '][label]'}}" placeholder="Enter your label">
</div>
<div class="form-group mb-3">
    <label class="mb-1" for="custom_id">Custom ID</label>
    <input type="text" class="form-control" id="custom_id" name="{{ $dataType . '[' . $rowNo . '][' . $sectionNo . '][custom_id]'}}" placeholder="Enter your custom ID">
</div>
<div class="form-group mb-3">
    <label class="mb-1" for="custom_classes">Custom Class(s)</label>
    <input type="text" class="form-control" id="custom_classes" name="{{ $dataType . '[' . $rowNo . '][' . $sectionNo . '][custom_classes]'}}" aria-labelledby="custom_classes_hlp" placeholder="Enter your custom
    class(s)">
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
<div class="form-group mb-3">
    <label class="mb-1" for="min_limit">Minimum Limit</label>
    <input type="number" class="form-control required-field" id="min_limit" name="{{ $dataType . '[' . $rowNo . '][' . $sectionNo . '][min_limit]'}}" placeholder="Enter your minimum limit">
</div>
<div class="form-group mb-3">
    <label class="mb-1" for="max_limit">Maximum Limit</label>
    <input type="number" class="form-control required-field" id="max_limit" name="{{ $dataType . '[' . $rowNo . '][' . $sectionNo . '][max_limit]'}}" placeholder="Enter your maximum limit">
</div>
