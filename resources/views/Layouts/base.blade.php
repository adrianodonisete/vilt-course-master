<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>
        [Systax] Novo Admin
        @isset($title_page)
            - {{ $title_page }}
        @endisset
    </title>
</head>

<body>
    <header>
        @include('layouts.menu')
    </header>

    <main class="container">
        @yield('content')
    </main>

    <footer>
        Systax - {{ date('Y') }}
    </footer>
</body>

</html>
