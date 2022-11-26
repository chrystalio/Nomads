<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Nomads</title>
    @include('includes.admin._styles')
</head>
<body>
<div id="app">
    @include('includes.admin._sidebar')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>
        @yield('content')
        @include('includes.admin._footer')
    </div>
</div>
@include('includes.admin._scripts')
</body>
</html>
