<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lareduca</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="font-sans antialiased bg-hackerBg min-h-screen flex flex-col justify-between bg-cover bg-center" style="background-image: url('{{ asset('images/fondo.gif') }}');">
    <div class="flex-grow">
        <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
            <div class="flex lg:justify-center lg:col-start-2">
                <img src="{{ asset('images/Logo LaraEduca.webp') }}" class="h-28 w-auto lg:h-52 rounded-2xl " alt="Logo">
            </div>
        </header>


        <div class="flex items-center justify-center flex-grow">
            @if (Route::has('login'))
                <nav class="flex space-x-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="rounded-md px-4 py-2 text-white bg-hackerViolet transition hover:bg-hackerPurple focus:outline-none focus:ring-2 focus:ring-hackerViolet">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="rounded-md px-4 py-2 text-white bg-hackerViolet transition hover:bg-hackerPurple focus:outline-none focus:ring-2 focus:ring-hackerViolet">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="rounded-md px-4 py-2 text-white bg-hackerBlue transition hover:bg-hackerPurple focus:outline-none focus:ring-2 focus:ring-hackerBlue">Register</a>
                        @endif
                    @endauth
                </nav>
            @endif
        </div>
    </div>

    <footer class="py-6 text-center text-sm text-white bg-hackerBg border-t border-hackerViolet">
        <p>Santiago Samuel Benítez Álvarez</p>
    </footer>
</body>
</html>
