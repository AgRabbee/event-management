<script>
    window.successAlert = function (title = "Your work has been saved") {
        Swal.fire({
                      icon             : "success",
                      title            : title,
                      showConfirmButton: false,
                      timer            : 2000
                  })
    }

    window.errorAlert = function (msg = '') {
        Swal.fire({
                      icon : "error",
                      title: "Oops...",
                      text : msg ?? "Something went wrong!",
                  });
    }

    window.statusChangeAlert = function (url, data,  btn, btnContent) {
        Swal.fire({
                      title             : "Are you sure?",
                      text              : "Do you want to change the status?",
                      icon              : "warning",
                      showCancelButton  : true,
                      confirmButtonColor: "#3085d6",
                      cancelButtonColor : "#d33",
                      confirmButtonText : "Yes, Change it!"
                  }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                           url    : url,
                           method : 'PATCH',
                           headers: {
                               'X-CSRF-TOKEN': '{{ csrf_token() }}'
                           },
                           data   : data,
                           success: function (response) {
                               btn.prop('disabled', true);
                               btn.html(btnContent);
                               successAlert('Your work has been updated');
                               location.reload();
                           },
                           error  : function (xhr) {
                               btn.prop('disabled', false);
                               btn.html(btnContent);
                               errorAlert();
                           }
                       });
            }
            else{
                btn.prop('disabled', false);
                btn.html(btnContent);
            }
        });
    }

    window.deleteAlert = function (url, btn, btnContent) {
        Swal.fire({
                      title             : "Are you sure?",
                      text              : "Do you want to delete?",
                      icon              : "warning",
                      showCancelButton  : true,
                      confirmButtonColor: "#3085d6",
                      cancelButtonColor : "#d33",
                      confirmButtonText : "Yes, Delete it!"
                  }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                           url    : url,
                           method : 'Delete',
                           headers: {
                               'X-CSRF-TOKEN': '{{ csrf_token() }}'
                           },
                           success: function (response) {
                               btn.prop('disabled', true);
                               btn.html(btnContent);
                               successAlert('Your work has been deleted');
                               location.reload();
                           },
                           error  : function (xhr) {
                               btn.prop('disabled', false);
                               btn.html(btnContent);
                               errorAlert();
                           }
                       });
            }
            else{
                btn.prop('disabled', false);
                btn.html(btnContent);
            }
        });
    }
</script>
