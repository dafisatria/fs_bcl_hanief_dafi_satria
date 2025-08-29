<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Armada & Pengiriman</title>
    {{-- Bootstrap CSS biar cepat --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Logistik App</a>
            <div>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{ route('armadas.index') }}" class="nav-link">Armada</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Pengiriman</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Pemesanan</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- Konten --}}
    <div class="container">
        @yield('content')
    </div>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>