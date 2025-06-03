<!DOCTYPE html>
<html class="scroll-smooth" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="KinerjaMetrik adalah aplikasi yang membantu mengelola kinerja pegawai dengan mudah dan cepat.">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link type="image/x-icon" href="{{ asset('favicon.ico') }}" rel="icon">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <title>{{ $title }} | {{ config('app.name') }}</title>

    @notifyCss
    @vite(['resources/css/app.css', 'resources/css/multi-select-tag.css', 'resources/js/app.js'])
</head>

<body>
    @include('notify::components.notify')

    @if (Auth::check())
        {{ $slot }}
    @else
        <main>
            {{ $slot }}
        </main>
    @endif

    @notifyJs
</body>

</html>
