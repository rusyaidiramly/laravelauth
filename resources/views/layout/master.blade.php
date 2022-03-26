<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/footer.css">
    @yield('headDependencies')
    <title>@yield('title')</title>
</head>
<body>
    @if (auth()->check())
        @include('layout.header')
    @endif
    @yield('content')
    @include('layout.footer')
    @yield('bodyDependencies')
    <script src="/js/bootstrap.bundle.min.js"></script>
</body>
</html>
