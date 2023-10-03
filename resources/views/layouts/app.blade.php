<!DOCTYPE html>
<html class="scroll-smooth" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <title>{{ $title }} - {{ config('app.name') }}</title>

    @notifyCss
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @include('notify::components.notify')

    @if (Auth::check())
        <div>
            {{ $slot }}
        </div>
    @else
        <main>
            {{ $slot }}
        </main>
    @endif

    @notifyJs
</body>

</html>
