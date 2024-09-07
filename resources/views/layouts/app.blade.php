<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>@yield('title')</title>
    @include('partials.head')
</head>
<body>
    <header>
        @include('partials.header')
    </header>
    <main class="container">
        @yield('content')
    </main>
    <footer>
        @include('partials.footer')
    </footer>
</body>
</html>
