<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Nomads - @yield('title')</title>
    @stack('prepend-style')
    @include('includes._styles')
    @stack('addon-style')
</head>
<body>
@include('includes._navbar-alt')
@yield('content')
@stack('prepend-script')
@include('includes._scripts')
@stack('addon-script')
</body>
</html>
