<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        @vite('resources/css/app.css')
        <title>{{ $title }}</title>
        <script
            defer
            src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"
        ></script>
        @livewireStyles
    </head>
    <body>
        @include('navbar.index')
        <div class="container mx-auto">@yield('content')</div>
        @livewireScripts
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                document.getElementById("myCartDropdownButton1").click();
            });
        </script>
    </body>
</html>
