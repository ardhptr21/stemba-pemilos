<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Stemba Pemilos' }}</title>
    @include('partials.styles')
</head>

<body>

    <header>
        @include('partials.header')
    </header>
    <main class="antialiased font-sans">
        @yield('content')
    </main>
    <footer>
        @include('partials.footer')
    </footer>

    @include('partials.scripts')
</body>

</html>
