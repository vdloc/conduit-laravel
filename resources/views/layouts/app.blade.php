<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
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
