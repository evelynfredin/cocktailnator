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
                        <a href="#">
                            <div class="card transition duration-500 ease-in-out transform">
                                <img class="rounded-t-xl w-full h-[300px] object-cover object-center" src="{{ $drink['strDrinkThumb'] }}" alt="">
                                <div class="mt-2 p-7">
                                    <h3 class="mb-5 text-3xl font-bold transition duration-300 ease-in-out transform">{{ $drink['strDrink'] }}</h3>
                                    <p>{{ Str::limit($drink['strInstructions'], 100) }}</p>
                                </div>
                            </div>
                        </a>
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
                        <a href="#">
                            <div class="card transition duration-500 ease-in-out transform h-auto">
                                <img class="rounded-t-xl w-full h-[300px] object-cover object-center" src="{{ $popularDrink['strDrinkThumb'] }}" alt="">
                                <div class="mt-2 p-7">
                                    <h3 class="mb-5 text-3xl font-bold transition duration-300 ease-in-out transform">{{ $popularDrink['strDrink'] }}</h3>
                                    <p>{{ Str::limit($popularDrink['strInstructions'], 100) }}</p>
                                </div>
                            </div>
                        </a>
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
