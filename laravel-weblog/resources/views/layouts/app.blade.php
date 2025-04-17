<!DOCTYPE html>
<html lang="en" class="h-full bg-white">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body class="h-full">
    <div class="min-h-full">
        @if (!isset($hideNav) || !$hideNav)
            @include('partials.nav')
        @endif

        @if(view()->hasSection('header1') && !view()->hasSection('header2'))
            @include('partials.header1')
            
        @elseif(view()->hasSection('header2'))
            @include('partials.header2')
        @endif

        @yield('content')
    </div>

    @if (!isset($hideFooter) || !$hideFooter)
        @include('partials.footer')
    @endif
    
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

    @vite('resources/js/app.js')
</body>
</html>