<div class="container px-4">
    @if($form_fields)
        @foreach($form_fields as $info_type=> $info_rows)
            @if($info_type != 'customer_info')
                <h5 class="mt-3">{{ ucwords(str_replace('_', ' ', $info_type)) }}</h5>
                <hr class="mt-1 mb-2">
            @endif
            @foreach($info_rows as $row_index=> $row_fields)
                <div class="row g-3 {{ $columnClass[count($row_fields)] }}">
                    @foreach($row_fields as $fieldIndex => $field)
                        @if(empty($field)) @continue @endif
                        @if(in_array($field['type'], ['text',"email"]))
                            <div class="form-group mb-3" style="{{ $field['inline_style'] }}">
                                <label class="mb-1" for="{{ $field['id'] }}">{{ $field['label'] }} @if($field['is_required'])
                                        <span class="text-danger">*</span>
                                    @endif</label>
                                <input type="{{ $field['type'] }}"
                                       class="form-control {{ $field['classList'] }} @error("'".$field['nameAttr']."'") is-invalid @enderror"
                                       id="{{ $field['id'] }}"
                                       name="{{ $field['nameAttr'] }}"
                                       placeholder="{{ $field['placeholder_text'] }}"
                                       value="{{ old("'".$field['nameAttr']."'") }}">

                                @error("'".$field['nameAttr']."'")
                                <small class="text-danger">{{ $field['error_msg'] }}</small>
                                @enderror
                            </div>

                        @elseif(in_array($field['type'], ["number","date"]))
                            <div class="form-group mb-3" style="{{ $field['inline_style'] }}">
                                <label class="mb-1" for="{{ $field['id'] }}">{{ $field['label'] }} @if($field['is_required'])
                                        <span class="text-danger">*</span>
                                    @endif</label>
                                <input type="{{ $field['type'] }}"
                                       class="form-control {{ $field['classList'] }} @error("'".$field['nameAttr']."'") is-invalid @enderror"
                                       id="{{ $field['id'] }}"
                                       name="{{ $field['nameAttr'] }}"
                                       min="{{ $field['min'] }}" max="{{ $field['max'] }}"
                                       value="{{ old("'".$field['nameAttr']."'") }}">

                                @error("'".$field['nameAttr']."'")
                                <small class="text-danger">{{ $field['error_msg'] }}</small>
                                @enderror
                            </div>

                        @elseif(in_array($field['type'], ["radio", "checkbox"]))
                            <div class="form-group mb-3" style="{{ $field['inline_style'] }}">
                                <label class="mb-1">{{ $field['label'] }} @if($field['is_required'])
                                        <span class="text-danger">*</span>
                                    @endif</label>
                                <br>
                                @foreach($field['options'] as $optionIndex=>$option)
                                    <div class="form-check form-check-inline">
                                        <input type="{{ $field['type'] }}"
                                               class="form-check-input {{ $field['classList'] }} @error("'".$field['nameAttr']."'") is-invalid @enderror"
                                               {{ $optionIndex == old("'".$field['nameAttr']."'") ? 'checked' : '' }}
                                               name="{{ $field['nameAttr'] }}" id="{{ $option['id'] }}" value="{{ $option['value'] }}">
                                        <label class="form-check-label" for="{{ $option['id'] }}">{{ $option['label'] }}</label>
                                    </div>
                                @endforeach
                                @error("'".$field['nameAttr']."'")
                                <small class="text-danger">{{ $field['error_msg'] }}</small>
                                @enderror
                            </div>

                        @elseif(in_array($field['type'], ["textarea"]))
                            <div class="form-group mb-3" style="{{ $field['inline_style'] }}">
                                <label class="mb-1" for="{{ $field['id'] }}">{{ $field['label'] }} @if($field['is_required'])
                                        <span class="text-danger">*</span>
                                    @endif</label>
                                <textarea id="{{ $field['id'] }}" name="{{ $field['nameAttr'] }}" rows="3"
                                          class="form-control {{ $field['classList'] }} @error("'".$field['nameAttr']."'") is-invalid @enderror">
                                    {{ old("'".$field['nameAttr']."'") }}
                                </textarea>

                                @error("'".$field['nameAttr']."'")
                                <small class="text-danger">{{ $field['error_msg'] }}</small>
                                @enderror
                            </div>

                        @elseif(in_array($field['type'], ["select"]))
                            <div class="form-group mb-3" style="{{ $field['inline_style'] }}">
                                <label class="mb-1" for="{{ $field['id'] }}">{{ $field['label'] }} @if($field['is_required'])
                                        <span class="text-danger">*</span>
                                    @endif</label>
                                <select id="{{ $field['id'] }}"
                                        name="{{ $field['nameAttr'] }}"
                                        class="form-control {{ $field['classList'] }} @error("'".$field['nameAttr']."'") is-invalid @enderror">
                                    @foreach($field['options'] as $optionIndex=>$option)
                                        <option value="{{ $optionIndex }}" {{ $optionIndex == old("'".$field['nameAttr']."'") ? 'selected' : '' }}>{{ $option }}</option>
                                    @endforeach
                                </select>

                                @error("'".$field['nameAttr']."'")
                                <small class="text-danger">{{ $field['error_msg'] }}</small>
                                @enderror
                            </div>
                        @endif
                    @endforeach
                </div>
            @endforeach
        @endforeach
    @else
        <p class="text-danger text-center my-3">No form fields found</p>
    @endif
</div>
