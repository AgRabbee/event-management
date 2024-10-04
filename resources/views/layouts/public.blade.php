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
    @yield('public-custom-css')
</head>

<body>
    @yield('public_content')

<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/dist/js/adminlte.min.js?v=3.2.0') }}"></script>

@yield('public-custom-js')
</body>
</html>
