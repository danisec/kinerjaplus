<!DOCTYPE html>
<html class="scroll-smooth" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="KinerjaPlus adalah aplikasi yang membantu mengelola kinerja karyawan dengan mudah dan cepat.">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <title>{{ $title }} - {{ config('app.name') }}</title>

    @notifyCss
    @vite(['resources/css/app.css', 'resources/css/multi-select-tag.css', 'resources/js/app.js'])
</head>

<body>
    @include('notify::components.notify')

    @php
        $agent = new \Jenssegers\Agent\Agent();
    @endphp

    @if ($agent->isDesktop())
        @if (Auth::check())
            <div>
                {{ $slot }}
            </div>
        @else
            <main>
                {{ $slot }}
            </main>
        @endif
    @else
        <div class="mx-auto flex min-h-screen flex-col justify-center p-4">
            <p class="text-base font-medium text-gray-900">Maaf, web aplikasi KinerjaPlus hanya dapat diakses melalui
                tampilan desktop.</p>
        </div>
    @endif

    @notifyJs
</body>

</html>
