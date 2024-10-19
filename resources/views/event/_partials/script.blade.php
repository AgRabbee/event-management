<script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>

<script>
    $(document).ready(function () {
        initiateData();

        $('.textarea').summernote({
            height: 200,
            dialogsInBody: true,
            callbacks: {
                onInit: function () {
                    $('body > .note-popover').hide();
                },
                onChange: function (contents, $editable) {
                    $(this).closest('.note-editor').siblings('textarea').val(contents);
                }
            },
        });


        $('.date-selection').datetimepicker({icons: {time: 'far fa-clock'}});
        $(function () {
            bsCustomFileInput.init();
        });

        $(document).on('click', '#btn-active-inActive', function () {
            let status = $(this).data('status');
            if (status === -1) {
                alert('You can not change the status of an ongoing/ archived event');
                return false;
            }

            let btn = $(this);
            let btnContent = btn.html();
            btn.prop('disabled', true);
            btn.html('<i class="fas fa-sync-alt fa-spin"></i>&nbsp;' + btnContent);

            $.ajax({
                url: btn.data('update-status-route'),
                method: 'post',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: {status: status},
                success: function (response) {
                    btn.prop('disabled', false);
                    btn.html(btnContent);
                    alert('Your work has been updated');
                    location.reload();
                },
                error: function (xhr) {
                    btn.prop('disabled', false);
                    btn.html(btnContent);
                    alert("Something went wrong");
                }
            });
        });

        $(document).on('change', '#img-input', function () {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').html(fileName);
            $(document).find('#is_image_change').val(1);
        });

        $(document).on('click', '#add-organizer-btn', function () {
            let btn = $(this);
            let btnContent = btn.html();
            btn.prop('disabled', true);
            btn.html('<i class="fas fa-sync-alt fa-spin"></i>&nbsp;' + btnContent);
            let parentObj = btn.parent();

            let org_no = parentObj.children().last().attr('id').split('_')[1];

            $.ajax({
                url: '{{ route('organizer.add') }}',
                method: 'POST',
                data: {org_no: org_no},
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function (response) {
                    if (response.responseCode === -1) {
                        alert(response.msg);
                    } else {
                        parentObj.append(response.html);
                    }
                    btn.prop('disabled', false);
                    btn.html(btnContent);
                },
                error: function (xhr) {
                    btn.prop('disabled', false);
                    btn.html(btnContent);
                    if (xhr.status === 422) {
                        console.log(xhr.responseJSON);
                    } else {
                        console.error('Error updating food vendor:', xhr.responseText);
                    }
                }
            });
        });

        $(document).on('click', '#remove-organizer-btn', function () {
            $(this).parent().parent().remove();
        });

        $(document).on('click', '.add_row', function () {

            let parentObj = $(this).siblings('.card-body');
            let lastRow = parentObj.children().last();
            let lastRowId = lastRow.attr('id').split('_')[2];
            console.log(lastRow, lastRowId);
            let newRowId = parseInt(lastRowId) + 1;
            let htmlObj = `
                     <div class="row form_row" id="form_row_${newRowId}">
                        <div class="col-md-12 p-0" id="customer_info_section_accordion_${newRowId}">
                            <div class="card card-primary card-outline">
                                <a class="d-block w-100" data-toggle="collapse" href="#customer_info_section_row_${newRowId}" aria-expanded="true">
                                    <div class="card-header d-flex justify-content-between">
                                        <h4 class="card-title w-100">
                                            Row no: ${newRowId}
                                        </h4>

                                        <button type="button" class="btn btn-sm btn-outline-danger remove_row" data-toggle="tooltip" data-placement="bottom"
                                            title="Remove this row">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-square" viewBox="0 0 16 16">
                                              <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                                              <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8"/>
                                            </svg>
                                        </button>
                                    </div>
                                </a>
                                <div id="customer_info_section_row_${newRowId}" class="collapse show" data-parent="#customer_info_section_accordion_${newRowId}">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                {{-- Grid selection --}}
            <div class="col-sm-3 col-md-3 p-0">
                <div class="form-group">
                    <label>No of column in a row<span class="text-danger">*</span></label>
                    <select class="form-control custom-select" id="grid_selection">
                        <option>-- Select One --</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="row" id="form_fields"></div>
</div>
</div>
</div>
</div>
</div>
`;
            parentObj.append(htmlObj);
        });

        $(document).on('click', '.remove_row', function () {
            $(this).closest('.row').remove();
        });

        $(document).on('change', '#grid_selection', function () {
            let col_num = $(this).val();
            if(col_num == '') return false;
            let classText = '';
            if (col_num == 1) {
                classText = 'col-sm-12 col-md-12';
            } else if (col_num == 2) {
                classText = 'col-sm-6 col-md-6';
            } else if (col_num == 3) {
                classText = 'col-sm-4 col-md-4';
            } else if (col_num == 4) {
                classText = 'col-sm-3 col-md-3';
            } else {
                alert('Invalid no of column selection');
                return false;
            }


            let formRowObj = $(this).closest('.form_row');
            let dataType = formRowObj.parent().parent().data('type');

            let formRowId = formRowObj.attr('id').split('_')[2];

            let htmlObj = ``;
            for (let i = 1; i <= col_num; i++) {
                htmlObj += `<div class="custom-box ${classText}" id="section_no_${i}">
                                <div class="form-group">
                                    <label>Input Type<span class="text-danger">*</span></label>
                                    <select class="form-control custom-select input_selection" name="${dataType}[${formRowId}][${i}][input_type]">
                                        <option value="" >-- Select One --</option>
                                        <option value="text">Text</option>
                                        <option value="email">Email</option>
                                        <option value="number">Number</option>
                                        <option value="date">Date</option>
                                        <option value="radio">Radio</option>
                                        <option value="checkbox">Checkbox</option>
                                        <option value="textarea">Textarea</option>
                                        <option value="dropdown">Dropdown</option>
                                    </select>
                                </div>
                                <span class="field_info_section" id="section_${i}"></span>
                            </div>`;
            }

            $(this).closest('.collapse').find('#form_fields').html(htmlObj);
        });

        $(document).on('change', '.input_selection', function () {
            let parentObj = $(this).closest('.custom-box');
            let inputType = $(this).val();
            let dataType = parentObj.closest('.form_row').parent().parent().data('type');
            let rowNo = parentObj.closest('.form_row').attr('id').split('_')[2];
            let sectionNo = parentObj.find('.field_info_section').attr('id').split('_')[1];
            parentObj.find('span').html("")
            $.ajax({
                url: '{{ route('events.formFieldStructure') }}',
                method: 'POST',
                data: {inputType: inputType, dataType: dataType, rowNo: rowNo, sectionNo: sectionNo},
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function (response) {
                    if(response.responseCode === -1){
                        alert(response.msg);
                    } else {
                        parentObj.find('.field_info_section').html(response.html);
                    }
                },
                error: function (xhr) {
                    if (xhr.status === 422) {
                        console.log(xhr.responseJSON);
                    } else {
                        console.error('Error updating food vendor:', xhr.responseText);
                    }
                }
            });
        });

        $(document).on('click', '.add_more_option', function () {
            let parentObj = $(this).closest('tr');

            let formRowObj = parentObj.closest('.form_row');
            let dataType = formRowObj.parent().parent().data('type');

            let formRowId = formRowObj.attr('id').split('_')[2];

            let sectionObjId = parentObj.closest('.custom-box').attr('id')
            let sectionNo = sectionObjId.split('_')[2];

            let lastRow = parentObj.closest('table').find('tr').last();
            let lastRowId = lastRow.attr('id').split('_')[1];
            let newRowId = parseInt(lastRowId) + 1;

            let htmlObj = `
                <tr id="row_${newRowId}">
                    <td class="text-center">${newRowId}</td>
                    <td>
                        <input type="text" class="form-control required-field" name="${dataType}[${formRowId}][${sectionNo}][opt][${newRowId}][label]">
                    </td>
                    <td>
                        <input type="text" class="form-control required-field" name="${dataType}[${formRowId}][${sectionNo}][opt][${newRowId}][value]">
                    </td>
                    <td class="text-center">
                        <div class="form-check">
                            <input class="form-check-input required-field" name="${dataType}[${formRowId}][${sectionNo}][opt][${newRowId}][checked]" type="checkbox" value="1">
                            <label class="form-check-label">Yes</label>
                        </div>
                    </td>
                    <td>
                        <input type="text" class="form-control required-field" name="${dataType}[${formRowId}][${sectionNo}][opt][${newRowId}][custom_id]">
                    </td>
                    <td>
                        <button type="button" class="btn btn-sm btn-outline-secondary remove_option" data-toggle="tooltip" data-placement="bottom" title="Remove this option">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-square" viewBox="0 0 16 16">
                              <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                              <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8"/>
                            </svg>
                        </button>
                    </td>
                </tr>
            `;

            parentObj.closest('table').append(htmlObj);
        });

        $(document).on('click', '.remove_option', function () {
            $(this).closest('tr').remove();
        });

        $(document).on('click', '.add_more_select_option', function () {
            let parentObj = $(this).closest('tr');

            let formRowObj = parentObj.closest('.form_row');
            let dataType = formRowObj.parent().parent().data('type');

            let formRowId = formRowObj.attr('id').split('_')[2];

            let sectionObjId = parentObj.closest('.custom-box').attr('id')
            let sectionNo = sectionObjId.split('_')[2];

            let lastRow = parentObj.closest('table').find('tr').last();
            let lastRowId = lastRow.attr('id').split('_')[1];
            let newRowId = parseInt(lastRowId) + 1;

            console.log(dataType, sectionNo);

            let htmlObj = `
                <tr id="row_${newRowId}">
                    <td class="text-center">${newRowId}</td>
                    <td>
                        <input type="text" class="form-control required-field" name="${dataType}[${formRowId}][${sectionNo}][opt][${newRowId}][label]">
                    </td>
                    <td>
                        <input type="text" class="form-control required-field" name="${dataType}[${formRowId}][${sectionNo}][opt][${newRowId}][value]">
                    </td>
                    <td>
                        <button type="button" class="btn btn-sm btn-outline-secondary remove_option" data-toggle="tooltip" data-placement="bottom" title="Remove this option">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-square" viewBox="0 0 16 16">
                              <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                              <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8"/>
                            </svg>
                        </button>
                    </td>
                </tr>
            `;

            parentObj.closest('table').append(htmlObj);
        });


    });
</script>

<script>
    function initiateData() {
        $(document).find('#loading_overlay').css('display', 'flex');
        $.ajax({
            url: "{{ route('events.list') }}",
            method: 'GET',
            success: function (response) {
                if (response.responseCode == 1) {
                    $('#event-list-display').html(response.html);
                } else {
                    $('#event-list-display').html(response.msg);
                }
                $(document).find('#loading_overlay').css('display', 'none');
                datatable('event-list');
            },
            error: function () {
                $(document).find('#loading_overlay').css('display', 'none');
            }
        });
    }

</script>
