<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Student System')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js']) {{-- If using Laravel Breeze or Vite --}}
</head>
<body class="bg-gray-100 text-gray-900">
    <div class="min-h-screen flex flex-col items-center justify-center">
        @yield('content')
    </div>
</body>
</html>
