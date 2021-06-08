<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cocktailnator</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-gray-100 text-gray-800 flex flex-col min-h-screen">
    <header class="py-8 border-b">
        <div class="flex justify-between items-center container mx-auto px-5 md:px-0">
            <div class="text-2xl font-black">
                <a href="{{ route('home') }}">Cocktailnator</a>
            </div>
            <nav class="flex items-center">
                <button aria-label="Open menu" class="inline-flex md:hidden btnMenu hover:bg-gray-200 rounded-full p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
                    </svg>
                </button>

                <ul class="md:flex hidden space-x-9 text-gray-500">
                    @auth
                        <li>Welcome, {{ auth()->user()->name }}!</li>
                        <li><a href="/logout" class="uppercase font-bold text-indigo-600">Logout</a></li>
                    @endauth
                    @guest
                        <li><a href="{{ route('login') }}" class="hover:text-gray-800">Log in</a></li>
                        <li><a href="{{ route('signup') }}" class="hover:bg-indigo-700 btn">Sign up</a></li>
                    @endguest
                </ul>
            </nav>
        </div>
    </header>

    <main class="container mx-auto flex-grow">
        @yield('content')
    </main>

    <footer class="mt-20">
        <div class=" text-gray-400 py-5 border-t border-gray-200">
            <div class="flex justify-between items-center container mx-auto px-5">
                <div class="text-xl font-black">
                    Cocktailnator
                </div>
                <div>
                    Made possible with the CocktailDB
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
