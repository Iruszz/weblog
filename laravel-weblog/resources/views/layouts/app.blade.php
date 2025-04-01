<!DOCTYPE html>
<html lang="en" class="h-full bg-white">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Document</title>
</head>
<body class="h-full">
    @if (!isset($hideNav) || !$hideNav)
        @include('partials.nav')
    @endif

    @if(view()->hasSection('header1') && !view()->hasSection('header2'))
        @include('partials.header1')
    @endif

    @yield('content')
</body>

@if (!isset($hideFooter) || !$hideFooter)
    @include('partials.footer')
@endif

</html>