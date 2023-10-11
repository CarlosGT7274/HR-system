<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $pageTitle }}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite('resources/css/app.css')
    @yield('css-styles')
</head>

<body></body>
<div id="nav-bar">
    @yield('navbar')
</div>

<div id="main-container">
    @yield('content')
</div>

<footer>
    @yield('footer')
</footer>

@vite('resources/js/app.js')
@yield('js-scripts')

</html>
