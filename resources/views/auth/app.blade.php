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
    {{-- Sweet Alert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- Leaflet --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <title>@yield('title') | SenoNet</title>
</head>

<body class="bg-slate-100">
    {{-- Start Loading Element --}}
    <div id="loading" class="z-50 hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center">
        <svg aria-hidden="true" class="inline w-10 h-10 text-gray-200 animate-spin dark:text-gray-600 fill-indigo-600"
            viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                fill="currentColor" />
            <path
                d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                fill="currentFill" />
        </svg>
        <span class="sr-only">Loading...</span>
    </div>
    {{-- End Loading Element --}}

    {{-- Start Main --}}
    <main>
        @if (session('success'))
            <script>
                Swal.fire('Success', "{{ session('success') }}", 'success');
            </script>
        @elseif (session('error'))
            <script>
                Swal.fire('Error', "{{ session('error') }}", 'error')
            </script>
        @elseif (session('warning'))
            <script>
                Swal.fire('Warning', "{{ session('warning') }}", 'warning')
            </script>
        @endif

        @yield('content')
    </main>
    {{-- End Main --}}

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // swall fire
        document.querySelectorAll('.delete-confirm').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.closest('form').submit();
                    }
                });
            });
        });

        // loading effect
        $(document).ready(function() {
            $(window).on("beforeunload", function() {
                $("#loading").removeClass("hidden");
            });

            // when submit form
            $('form').on('submit', function() {
                $('#loading').removeClass('hidden');
            });

            // when a element clicked
            $('a').on('click', function(event) {
                if ($(this).attr('target') !== '_blank' && $(this).attr('href') !== '#') {
                    $('#loading').removeClass('hidden');
                };
            });

            // when ajax request running
            $(document).ajaxStart(function() {
                $('#loading').removeClass('hidden');
            }).ajaxStop(function() {
                $('#loading').addClass('hidden');
            });

            // when page loaded
            $(window).on("load", function() {
                $("#loading").addClass("hidden");
            });
        });
    </script>
</body>

</html>
