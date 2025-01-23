<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- FontAwesome CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    {{-- AlpineJs --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <title>@yield('title', 'HadiNET | Home')</title>
</head>

<body style="background: #F3F5FA">
    <header>
        @include('components._navbar')
    </header>

    <section class="bg-white dark:bg-gray-900">
        @include('home._hero')
    </section>

</body>

</html>
