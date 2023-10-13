<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $pageTitle }}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite('resources/css/app.css')
    @vite('resources/icons/css/all.min.css')
    @yield('css-styles')
</head>

<body style="height: 100vh">
    <div id="main-container" class="h-full">
        @yield('content')
    </div>


    @vite('resources/js/app.js')
    @yield('js-scripts')
</body>

</html>
