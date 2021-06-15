@extends('layout.main')

@section('content')

    <div>
        <x-status />
    </div>


    <!-- Hero -->
    <div class="container mx-auto text-left md:text-center mt-10 px-5">
        <h1 class="text-5xl md:text-6xl lg:text-7xl font-black leading-15 tracking-tight">
            Welcome to
            <span class="block text-transparent bg-clip-text bg-gradient-to-br from-pink-400 via-indigo-500 to-pink-400">
                Cocktailnator
            </span>
        </h1>
        <div class="mx-auto mt-10 mb-5 text-gray-500 text-center lg:text-lg">
            Get started by searching for something to drink
        </div>
        <div class="container mx-auto w-full">
            <x-search />
        </div>
    </div>
    <!-- /Hero -->

    <!-- Latest drinks -->
    @if (count($drinks))
        <div class="px-5 md:px-0">
            <section class="container mx-auto mt-24 w-full bg-gradient-to-b from-white to-gray-100 py-10 sm:py-12 md:py-16 px-5 md:px-10 max-w-7xl">
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-extrabold">Newest recipes</h2>
                <p class="text-lg text-gray-700">Here are some of the newest drinks in the database, try them out!</p>

                <!-- Card grid -->
                <div class="grid grid-cols-1 lg:grid-cols-3 mt-10 gap-6 h-auto">

                    @foreach ($drinks as $drink)
                        <div class="card transition duration-500 ease-in-out transform flex flex-col justify-between">
                            <a href="{{ route('drink', $drink['idDrink']) }}">
                                <img class="rounded-t-xl w-full h-[300px] object-cover object-center" src="{{ $drink['strDrinkThumb'] }}" alt="">

                                <div class="p-7">
                                    <h3 class="mb-5 text-3xl font-bold transition duration-300 ease-in-out transform">{{ $drink['strDrink'] }}</h3>
                                    <p>{{ Str::limit($drink['strInstructions'], 80) }}</p>
                                </div>
                            </a>
                            <div class="flex justify-between px-7 mb-5">
                                <a href="{{ route('drink', $drink['idDrink']) }}">
                                    <span class="hover:text-indigo-300">
                                        View recipe
                                    </span>
                                </a>
                                @auth
                                    @if ($favorites->contains('drink_id', $drink['idDrink']))
                                        <form action="{{ route('delete', $drink['idDrink']) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-300 fill-current" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                                </svg>
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{ route('favorite', $drink['idDrink']) }}" method="POST">
                                            @csrf
                                            <button type="submit">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-indigo-300 hover:fill-current" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                                </svg>
                                            </button>
                                        </form>
                                    @endif
                                @endauth
                            </div>
                        </div>

                    @endforeach
                </div>
                <!-- / Card grid -->

            </section>
        </div>

    @else
        <p>Nothing to show</p>
    @endif

    <!-- / Latest drinks -->

    <!-- Popular drinks -->
    @if (count($popularDrinks))
        <div class="px-5 md:px-0">
            <section class="container mx-auto bg-gradient-to-b from-gray-100 to-white w-full py-10 sm:py-12 md:py-16 px-5 md:px-10 max-w-7xl">
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-extrabold">Popular recipes</h2>
                <p class="text-lg text-gray-700">Here are some of the most popular drinks in the database, fancy one?</p>

                <!-- Card grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 mt-10 gap-6 h-auto">

                    @foreach ($popularDrinks as $popularDrink)
                        <div class="card transition duration-500 ease-in-out transform flex flex-col justify-between">
                            <a href="{{ route('drink', $popularDrink['idDrink']) }}">
                                <img class="rounded-t-xl w-full h-[300px] object-cover object-center" src="{{ $popularDrink['strDrinkThumb'] }}" alt="">

                                <div class="p-7">
                                    <h3 class="mb-5 text-3xl font-bold transition duration-300 ease-in-out transform">{{ $popularDrink['strDrink'] }}</h3>
                                    <p>{{ Str::limit($popularDrink['strInstructions'], 80) }}</p>
                                </div>
                            </a>
                            <div class="flex justify-between px-7 mb-5">
                                <a href="{{ route('drink', $popularDrink['idDrink']) }}">
                                    <span class="hover:text-indigo-300">
                                        View recipe
                                    </span>
                                </a>
                                @auth
                                    @if ($favorites->contains('drink_id', $popularDrink['idDrink']))
                                        <form action="{{ route('delete', $popularDrink['idDrink']) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-300 fill-current" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                                </svg>
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{ route('favorite', $popularDrink['idDrink']) }}" method="POST">
                                            @csrf
                                            <button type="submit">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-indigo-300 hover:fill-current" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                                </svg>
                                            </button>
                                        </form>
                                    @endif
                                @endauth
                            </div>
                        </div>

                    @endforeach
                </div>
                <!-- / Card grid -->

            </section>
        </div>

    @else
        <p>Nothing to show</p>
    @endif

    <!-- / Popular drinks -->

@endsection
