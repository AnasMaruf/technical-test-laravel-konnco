<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        @vite('resources/css/app.css')
        <title>{{ $title }}</title>
    </head>
    <body>
        @include('navbar.index')
        <div class="container mx-auto">@yield('content')</div>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                document.getElementById("myCartDropdownButton1").click();
            });
        </script>
    </body>
</html>
