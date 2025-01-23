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
    {{-- Google Maps Api --}}
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key={{ config('google.key') }}&libraries=places&region=id">
    </script> --}}

    <title>@yield('title', 'HadiNET | Order')</title>

</head>

<body style="background: #F3F5FA">
    <header>
        @include('components._navbar')
    </header>

    <section class="py-8 antialiased dark:bg-gray-900 md:py-16">
        @include('order._customer-form')
    </section>

</body>

</html>
