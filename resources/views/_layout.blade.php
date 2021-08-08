<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <link href="{{ asset('vendor/bootstrap-5.1.0/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('favicon.png') }}">
    <title>Holoo!</title>
</head>
<body class="text-center">

<div class="container">
    <div class="row">
        <div class="col">
            <header class="text-center py-3 mb-3" style="background: linear-gradient(to bottom, #ccc, transparent)">
                <a href="{{ auth()->check() ? route('contacts.index') : route('auth.sign-in') }}">
                    <img src="{{ asset('favicon.png') }}" alt="Logo" width="64" height="64"
                         style="border: 1px solid black; border-radius: 50%; padding: 10px; background: white">
                </a>
            </header>

            @if ($errors->any())
                <div class="alert alert-danger text-start">
                    <ul class="m-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger text-start"><span>{{ session('error') }}</span></div>
            @endif

            @if(session('success'))
                <div class="alert alert-success text-start"><span>{{ session('success') }}</span></div>
            @endif

            @yield('main')
        </div>
    </div>
</div>

<script src="{{ asset('vendor/bootstrap-5.1.0/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
