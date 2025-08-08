<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Agriconnect')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap & Icon --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css" rel="stylesheet">

    {{-- Optional: Breeze Admin Template CSS jika ada --}}
    {{-- <link href="{{ asset('template/assets/css/style.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            font-family: 'Segoe UI', sans-serif;
            overflow: hidden;
        }

        .card {
            background-color: #fff;
            border-radius: 1rem;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background-color: #4facfe;
            border-color: #4facfe;
        }

        .btn-primary:hover {
            background-color: #00c6ff;
            border-color: #00c6ff;
        }
    </style>
</head>

<body>
    @yield('content')

    {{-- JS Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
