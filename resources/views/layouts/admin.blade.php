<!DOCTYPE html>
<html lang="en">
<head>
    <title>
        @hasSection('title')
            @yield('title')
        @else
            {{ config('app.name') }}
        @endif
    </title>

    @include('_partials.admin.header')

    @yield('admin-custom-css')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/fontawesome.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote.css') }}">

</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

    @include('_partials.admin.nav')

    @include('_partials.admin.side-bar')

    <div class="content-wrapper">
        <!-- Alert message -->
        <div class="p-3">
            @include('_partials.admin.session_msg')
        </div>
        <!-- Alert message -->

        @include('_partials.admin.header-section', [
                'dynamicContent' => $dynamicContent ?? null,
                'pageName'       => $pageName ?? null,
              ])

        @yield('content')

    </div>

    @include('_partials.admin.footer')

    <script src="{{asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{asset('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
    <script src="{{asset('assets/dist/js/adminlte.min.js') }}"></script>
    <script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{asset('assets/plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('assets/plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>
    <script src="{{asset('assets/js/helpers.js')}}"></script>
    <script src="{{asset('assets/plugins/summernote/summernote.js')}}"></script>
    <script src="{{asset('assets/js/custom.js')}}"></script>

    @include('_partials.sweetAlert')

    @include('_partials.datatable')

    @yield('js')
    <script>
        $(document).on('click', 'button[type=submit]', function () {
            let btn = $(this);
            let btnContent = btn.html();
            let form = btn.closest('form');
            if (form.length > 0) {
                form.submit();
                btn.prop('disabled', true);
                btn.html('<i class="fas fa-sync-alt fa-spin"></i>&nbsp;' + btnContent);
            }
        });
    </script>
</div>

</body>
</html>
