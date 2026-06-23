<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My App')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    {{-- Header --}}
    @include('layouts.partials.header')

    <div>
        <div class="flex">

            {{-- Sidebar --}}
            <div>
                @include('layouts.partials.sidebar')
            </div>

            {{-- Main Content --}}
            <div class="w-full py-6 px-10">
                @yield('content')
            </div>

        </div>
    </div>

    @stack('scripts')
</body>
</html>
