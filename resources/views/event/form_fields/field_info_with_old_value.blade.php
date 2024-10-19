@if (in_array($section_field['type'], ['text', 'email', 'textarea']))
    <div class="form-group mb-3">
        <label class="mb-1" for="label">Label <span class="text-danger">*</span></label>
        <input type="text" class="form-control required-field" id="label"
               name="{{ $info_index . '[' . $row_index . '][' . $section_index . '][label]' }}"
               placeholder="Enter your label" value="{{ $section_field['label'] }}">
    </div>
    <div class="form-group mb-3">
        <label class="mb-1" for="placeholder_text">Placeholder Text <span class="text-danger">*</span></label>
        <input type="text" class="form-control required-field" id="placeholder_text" name="{{$info_index . '[' . $row_index . '][' . $section_index . '][placeholder_text]'}}"
               placeholder="Enter your placeholder text" value="{{ $section_field['placeholder_text'] }}">
    </div>
    <div class="form-group mb-3">
        <label class="mb-1" for="custom_id">Custom ID</label>
        <input type="text" class="form-control" id="custom_id" name="{{$info_index . '[' . $row_index . '][' . $section_index . '][custom_id]'}}"
               placeholder="Enter your custom ID" value="{{ $section_field['id'] }}">
    </div>
    <div class="form-group mb-3">
        <label class="mb-1" for="custom_classes">Custom Class(s)</label>
        <input type="text" class="form-control" id="custom_classes" name="{{$info_index . '[' . $row_index . '][' . $section_index . '][custom_classes]'}}" aria-labelledby="custom_classes_hlp"
               placeholder="Enter your custom class(s)" value="{{ $section_field['classList'] }}">
        <small class="form-text text-muted" id="custom_classes_hlp">Multiple classes should be comma separated</small>
    </div>
    <div class="form-group mb-3">
        <label class="mb-1" for="custom_id">Will it be required? <span class="text-danger">*</span></label>
        <div class="form-check">
            <input class="form-check-input required-field" name="{{$info_index . '[' . $row_index . '][' . $section_index . '][is_required]'}}" type="checkbox"
                   {{ $section_field['is_required'] == 1 ? 'checked' : '' }} value="1">
            <label class="form-check-label">Yes</label>
        </div>
    </div>
    <div class="form-group mb-3">
        <label class="mb-1" for="err_msg">Error Message</label>
        <input type="text" class="form-control required-field" id="err_msg" name="{{$info_index . '[' . $row_index . '][' . $section_index . '][err_msg]'}}"
               placeholder="Enter your custom error message" value="{{ $section_field['error_msg'] }}">
    </div>

@elseif ($section_field['type'] == 'number')
    <div class="form-group mb-3">
        <label class="mb-1" for="label">Label <span class="text-danger">*</span></label>
        <input type="text" class="form-control required-field" id="label" name="{{ $info_index . '[' . $row_index . '][' . $section_index . '][label]'}}"
               placeholder="Enter your label" value="{{ $section_field['label'] }}">
    </div>
    <div class="form-group mb-3">
        <label class="mb-1" for="custom_id">Custom ID</label>
        <input type="text" class="form-control" id="custom_id" name="{{ $info_index . '[' . $row_index . '][' . $section_index . '][custom_id]'}}"
               placeholder="Enter your custom ID" value="{{ $section_field['id'] }}">
    </div>
    <div class="form-group mb-3">
        <label class="mb-1" for="custom_classes">Custom Class(s)</label>
        <input type="text" class="form-control" id="custom_classes" name="{{ $info_index . '[' . $row_index . '][' . $section_index . '][custom_classes]'}}" aria-labelledby="custom_classes_hlp"
               placeholder="Enter your custom class(s)" value="{{ $section_field['classList'] }}">
        <small class="form-text text-muted" id="custom_classes_hlp">Multiple classes should be comma separated</small>
    </div>
    <div class="form-group mb-3">
        <label class="mb-1" for="custom_id">Will it be required? <span class="text-danger">*</span></label>
        <div class="form-check">
            <input class="form-check-input required-field" name="{{ $info_index . '[' . $row_index . '][' . $section_index . '][is_required]'}}" type="checkbox"
                  {{ $section_field['is_required'] == 1 ? 'checked' : '' }} value="1">
            <label class="form-check-label">Yes</label>
        </div>
    </div>
    <div class="form-group mb-3">
        <label class="mb-1" for="err_msg">Error Message</label>
        <input type="text" class="form-control required-field" id="err_msg" name="{{ $info_index . '[' . $row_index . '][' . $section_index . '][err_msg]'}}"
               placeholder="Enter your custom error message" value="{{ $section_field['error_msg'] }}">
    </div>
    <div class="form-group mb-3">
        <label class="mb-1" for="min_limit">Minimum Limit</label>
        <input type="number" class="form-control required-field" id="min_limit" name="{{ $info_index . '[' . $row_index . '][' . $section_index . '][min_limit]'}}"
               placeholder="Enter your minimum limit" value="{{ $section_field['min'] }}">
    </div>
    <div class="form-group mb-3">
        <label class="mb-1" for="max_limit">Maximum Limit</label>
        <input type="number" class="form-control required-field" id="max_limit" name="{{ $info_index . '[' . $row_index . '][' . $section_index . '][max_limit]'}}"
               placeholder="Enter your maximum limit" value="{{ $section_field['max'] }}">
    </div>
@elseif ($section_field['type'] == 'date')
    <div class="form-group mb-3">
        <label class="mb-1" for="label">Label <span class="text-danger">*</span></label>
        <input type="text" class="form-control required-field" id="label" name="{{ $info_index . '[' . $row_index . '][' . $section_index . '][label]'}}"
               placeholder="Enter your label" value="{{ $section_field['label'] }}">
    </div>
    <div class="form-group mb-3">
        <label class="mb-1" for="custom_id">Custom ID</label>
        <input type="text" class="form-control" id="custom_id" name="{{ $info_index . '[' . $row_index . '][' . $section_index . '][custom_id]'}}"
               placeholder="Enter your custom ID" value="{{ $section_field['id'] }}">
    </div>
    <div class="form-group mb-3">
        <label class="mb-1" for="custom_classes">Custom Class(s)</label>
        <input type="text" class="form-control" id="custom_classes" name="{{ $info_index . '[' . $row_index . '][' . $section_index . '][custom_classes]'}}" aria-labelledby="custom_classes_hlp"
               placeholder="Enter your custom class(s)" value="{{ $section_field['classList'] }}">
        <small class="form-text text-muted" id="custom_classes_hlp">Multiple classes should be comma separated</small>
    </div>
    <div class="form-group mb-3">
        <label class="mb-1" for="custom_id">Will it be required? <span class="text-danger">*</span></label>
        <div class="form-check">
            <input class="form-check-input required-field" name="{{ $info_index . '[' . $row_index . '][' . $section_index . '][is_required]'}}" type="checkbox"
                   {{ $section_field['is_required'] == 1 ? 'checked' : '' }} value="1">
            <label class="form-check-label">Yes</label>
        </div>
    </div>
    <div class="form-group mb-3">
        <label class="mb-1" for="err_msg">Error Message</label>
        <input type="text" class="form-control required-field" id="err_msg" name="{{ $info_index . '[' . $row_index . '][' . $section_index . '][err_msg]'}}"
               placeholder="Enter your custom error message" value="{{ $section_field['error_msg'] }}">
    </div>
    <div class="form-group mb-3">
        <label class="mb-1" for="min_limit">Minimum Limit</label>
        <input type="date" class="form-control required-field" id="min_limit" name="{{ $info_index . '[' . $row_index . '][' . $section_index . '][min_limit]'}}"
               placeholder="Enter your minimum date limit" value="{{ $section_field['min'] }}">
    </div>
    <div class="form-group mb-3">
        <label class="mb-1" for="max_limit">Maximum Limit</label>
        <input type="date" class="form-control required-field" id="max_limit" name="{{ $info_index . '[' . $row_index . '][' . $section_index . '][max_limit]'}}"
               placeholder="Enter your maximum date limit" value="{{ $section_field['max'] }}">
    </div>
@elseif ($section_field['type'] == 'dropdown')
    <div class="form-group mb-3">
        <label class="mb-1" for="label">Label <span class="text-danger">*</span></label>
        <input type="text" class="form-control required-field" id="label" name="{{ $info_index . '[' . $row_index . '][' . $section_index . '][label]'}}"
               placeholder="Enter your label" value="{{ $section_field['label'] }}">
    </div>
    <div class="form-group mb-3">
        <label class="mb-1" for="custom_id">Custom ID</label>
        <input type="text" class="form-control" id="custom_id" name="{{$info_index . '[' . $row_index . '][' . $section_index . '][custom_id]'}}"
               placeholder="Enter your custom ID" value="{{ $section_field['id'] }}">
    </div>
    <div class="form-group mb-3">
        <label class="mb-1" for="custom_classes">Custom Class(s)</label>
        <input type="text" class="form-control" id="custom_classes" name="{{ $info_index . '[' . $row_index . '][' . $section_index . '][custom_classes]'}}" aria-labelledby="custom_classes_hlp"
               placeholder="Enter your custom class(s)" value="{{ $section_field['classList'] }}">
        <small class="form-text text-muted" id="custom_classes_hlp">Multiple classes should be comma separated</small>
    </div>
    <div class="form-group mb-3">
        <label class="mb-1" for="custom_id">Will it be required? <span class="text-danger">*</span></label>
        <div class="form-check">
            <input class="form-check-input required-field" name="{{ $info_index . '[' . $row_index . '][' . $section_index . '][is_required]'}}" type="checkbox"
                   {{ $section_field['is_required'] == 1 ? 'checked' : '' }} value="1">
            <label class="form-check-label">Yes</label>
        </div>
    </div>
    <div class="form-group mb-3">
        <label class="mb-1" for="err_msg">Error Message</label>
        <input type="text" class="form-control required-field" id="err_msg" name="{{ $info_index . '[' . $row_index . '][' . $section_index . '][err_msg]'}}"
               placeholder="Enter your custom error message" value="{{ $section_field['error_msg'] }}">
    </div>

    <h6>Options</h6>
    <hr class="mt-1 mb-2">
    <div>
        <table class="table table-bordered table-sm option-table">
            <tr>
                <th class="text-center">#SL</th>
                <th>Label</th>
                <th>Value</th>
                <th>Action</th>
            </tr>

            @foreach($section_field['options'] as $optionIndex=>$option)
            <tr id="row_{{$optionIndex}}">
                <td class="text-center">{{$optionIndex}}</td>
                <td>
                    <input type="text" class="form-control required-field" name="{{ $info_index . '[' . $row_index . '][' . $section_index . '][opt]['.$optionIndex.'][label]' }}" value="{{ $option['label'] }}">
                </td>
                <td>
                    <input type="text" class="form-control required-field" name="{{ $info_index . '[' . $row_index . '][' . $section_index . '][opt]['.$optionIndex.'][value]' }}" value="{{ $option['value'] }}">
                </td>
                <td>
                    @if($optionIndex == 1)
                    <button type="button" class="btn btn-sm btn-outline-secondary add_more_select_option" data-toggle="tooltip" data-placement="bottom" title="Add more option">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                            <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                        </svg>
                    </button>
                    @else
                        <button type="button" class="btn btn-sm btn-outline-secondary remove_option" data-toggle="tooltip" data-placement="bottom" title="Remove this option">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-square" viewBox="0 0 16 16">
                                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                                <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8"/>
                            </svg>
                        </button>
                    @endif
                </td>
            </tr>
            @endforeach

        </table>
    </div>
@elseif (in_array($section_field['type'], ['radio', 'checkbox']))
    <div class="form-group mb-3">
        <label class="mb-1" for="label">Label <span class="text-danger">*</span></label>
        <input type="text" class="form-control required-field" id="label" name="{{ $info_index . '[' . $row_index . '][' . $section_index . '][label]'}}"
               placeholder="Enter your label" value="{{ $section_field['label'] }}">
    </div>
    <div class="form-group mb-3">
        <label class="mb-1" for="custom_classes">Custom Class(s)</label>
        <input type="text" class="form-control" id="custom_classes" name="{{ $info_index . '[' . $row_index . '][' . $section_index . '][custom_classes]'}}" aria-labelledby="custom_classes_hlp"
               placeholder="Enter your custom class(s)" value="{{ $section_field['classList'] }}">
        <small class="form-text text-muted" id="custom_classes_hlp">Multiple classes should be comma separated</small>
    </div>
    <div class="form-group mb-3">
        <label class="mb-1" for="custom_id">Will it be required? <span class="text-danger">*</span></label>
        <div class="form-check">
            <input class="form-check-input required-field" name="{{ $info_index . '[' . $row_index . '][' . $section_index . '][is_required]'}}" type="checkbox"
                   {{ $section_field['is_required'] == 1 ? 'checked' : '' }} value="1">
            <label class="form-check-label">Yes</label>
        </div>
    </div>
    <div class="form-group mb-3">
        <label class="mb-1" for="err_msg">Error Message</label>
        <input type="text" class="form-control required-field" id="err_msg" name="{{ $info_index . '[' . $row_index . '][' . $section_index . '][err_msg]'}}"
               placeholder="Enter your custom error message" value="{{ $section_field['error_msg'] }}">
    </div>

    <h6>Options</h6>
    <hr class="mt-1 mb-2">
    <div>
        <table class="table table-bordered table-sm option-table">
            <tr>
                <th class="text-center">#SL</th>
                <th>Label</th>
                <th>Value</th>
                <th>Checked?</th>
                <th>Custom ID</th>
                <th>Action</th>
            </tr>
            @foreach($section_field['options'] as $optionIndex=>$option)
                <tr id="row_{{$optionIndex}}">
                    <td class="text-center">{{ $optionIndex }}</td>
                    <td>
                        <input type="text" class="form-control required-field" name="{{ $info_index . '[' . $row_index . '][' . $section_index . '][opt]['.$optionIndex.'][label]' }}"
                        value="{{ $option['label'] }}">
                    </td>
                    <td>
                        <input type="text" class="form-control required-field" name="{{ $info_index . '[' . $row_index . '][' . $section_index . '][opt]['.$optionIndex.'][value]' }}"
                        value="{{ $option['value'] }}">
                    </td>
                    <td class="text-center">
                        <div class="form-check">
                            <input class="form-check-input required-field" name="{{ $info_index . '[' . $row_index . '][' . $section_index . '][opt]['.$optionIndex.'][checked]' }}" type="checkbox"
                                   {{ $option['checked'] == 1 ? 'checked' : '' }} value="1">
                            <label class="form-check-label">Yes</label>
                        </div>
                    </td>
                    <td>
                        <input type="text" class="form-control required-field" name="{{ $info_index . '[' . $row_index . '][' . $section_index . '][opt]['.$optionIndex.'][custom_id]' }}"
                        value="{{ $option['id'] }}">
                    </td>
                    <td>
                        @if($optionIndex == 1)
                            <button type="button" class="btn btn-sm btn-outline-secondary add_more_option" data-toggle="tooltip" data-placement="bottom" title="Add more option">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                                </svg>
                            </button>
                        @else
                            <button type="button" class="btn btn-sm btn-outline-secondary remove_option" data-toggle="tooltip" data-placement="bottom" title="Remove this option">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-square" viewBox="0 0 16 16">
                                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                                    <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8"/>
                                </svg>
                            </button>
                        @endif
                    </td>
                </tr>
            @endforeach


        </table>
    </div>
@endif
