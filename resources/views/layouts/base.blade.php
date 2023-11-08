<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $pageTitle }}</title>
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css"> --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite('resources/css/app.css')
    @vite('resources/icons/css/all.min.css')
    @yield('css-styles')
</head>

<body>
    @include('components.navbar')

    <div class="flex flex-col sm:flex-row">
        @include('components.sidebar')


        <main class="p-6 w-4/5">
            @yield('content')
        </main>
    </div>

    @yield('footer')

    @vite('resources/js/app.js')

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
 --}}

    <script>
        const navbar = document.getElementById("navbar-container");
        const openBtn = document.getElementById("open");
        const closeBtn = document.getElementById("close");

        function showNav(flag) {
            if (flag) {
                navbar.classList.remove("hidden");
                openBtn.classList.add("hidden");
                closeBtn.classList.remove("hidden");
            } else {
                navbar.classList.add("hidden");
                openBtn.classList.remove("hidden");
                closeBtn.classList.add("hidden");
            }
        }

        const handleResize = () => {
            if (window.innerWidth >= 1024) {
                showNav(true);
            } else {
                showNav(false);
            }
        };

        window.addEventListener("resize", handleResize);
    </script>

    @yield('js-scripts')
</body>

</html>
