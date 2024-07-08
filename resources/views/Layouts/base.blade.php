<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @vite('resources/js/app.js')

    @hasSection('asset_css')
        @yield('asset_css')
    @endif

    <title>
        [Systax] Novo Admin
        @isset($title_page)
            - {{ $title_page }}
        @endisset
    </title>
</head>

<body>
    <header class="mx-auto w-full px-10 py-4">
        @include('layouts.menu')
    </header>

    <main class="container w-1/2 px-10 py-5">
        @yield('content')
    </main>

    <footer>
        Systax - {{ date('Y') }}
    </footer>

    @hasSection('asset_js')
        @yield('asset_js')
    @endif
</body>

</html>
