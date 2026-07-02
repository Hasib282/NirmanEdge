<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NirmanEdge Admin - @yield('title', 'website') </title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @include('layouts.user.header')

    <!-- Dynamic Content will be added here -->
    <div class="main-content">
        @yield('main-content')
    </div>

    @include('layouts.user.footer')

    {{-- Whats App Button  --}}
    <a href="https://wa.me/8801620602180" class="whatsapp-float" target="_blank" aria-label="Chat on WhatsApp">
        <i class="fa-brands fa-whatsapp"></i>
    </a>

    <script src="{{ asset('js/custom.js') }}"></script>
</body>
</html>