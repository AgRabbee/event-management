<script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>

<script>
    $(document).ready(function () {
        initiateData();

        $('.textarea').summernote({
            height: 200,
            dialogsInBody: true,
            callbacks:{
                onInit:function(){
                    $('body > .note-popover').hide();
                },
                onChange: function(contents, $editable) {
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
            if(status === -1){
                alert('You can not change the status of an ongoing/ archived event');
                return false;
            }

            let btn = $(this);
            let btnContent = btn.html();
            btn.prop('disabled', true);
            btn.html('<i class="fas fa-sync-alt fa-spin"></i>&nbsp;' + btnContent);

            $.ajax({
                url    : btn.data('update-status-route'),
                method : 'post',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data   : {status: status},
                success: function (response) {
                    btn.prop('disabled', false);
                    btn.html(btnContent);
                    alert('Your work has been updated');
                    location.reload();
                },
                error  : function (xhr) {
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
