<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title ?? 'Dashboard' }}</title>

    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.9.96/css/materialdesignicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/core/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/flatpickr/flatpickr.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
</head>

<body>
    {{-- Settings Panel --}}
    @include('partials.settings-panel')

    <div class="main-wrapper d-flex">
        {{-- Sidebar --}}
        @include('partials.sidebar')

        {{-- Page wrapper with full height and column layout --}}
        <div class="page-wrapper d-flex flex-column flex-grow-1 min-vh-100" style="margin-top: 60px;">
            {{-- Navbar --}}
            @include('partials.navbar')

            {{-- Page Content --}}
            <div class="page-content flex-grow-1 px-3 py-4">
                @yield('content')
            </div>

            {{-- Footer --}}
            @include('partials.footer')

        </div>
    </div>

    {{-- Scripts --}}
    <script src="{{ asset('assets/vendors/core/core.js') }}"></script>
    <script src="{{ asset('assets/vendors/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/js/template.js') }}"></script>
    @stack('scripts')
</body>

</html>
