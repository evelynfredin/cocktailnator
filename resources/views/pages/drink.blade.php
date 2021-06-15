@extends('layout.main')

@section('content')
    <div class="my-14 px-5 md:px-0 flex flex-col md:flex-row md:space-x-10 w-full lg:w-[1000px] mx-auto">
        <div class="w-full">
            <img src="{{ $drink['strDrinkThumb'] }}" alt="A serving of {{ $drink['strDrink'] }}" class="object-cover shadow-lg">
            @auth
                <button class="w-full mt-5 btn hover:bg-indigo-700 flex justify-center items-center">
                    Add to favorites
                    <span class="ml-5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-indigo-300 hover:fill-current" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </span>
                </button>
            @endauth
        </div>
        <div class="w-full md:w-3/3">
            <h2 class="text-2xl md:text-4xl font-black text-indigo-500">{{ $drink['strDrink'] }}</h2>
            <h3 class="text-xl my-5 md:text-2xl font-bold">Directions</h3>
            <p class="text-lg">{{ $drink['strInstructions'] }}</p>
            <h3 class="text-xl mt-10 md:text-2xl font-bold">Ingredients</h3>
            <ul class="divide-y-2 divide-solid divide-indigo-200">
                @foreach ($ingredients as $ingredient)
                    <li class="py-5 px-2 text-xl text-gray-600">{{ $ingredient['measure'] }} {{ $ingredient['item'] }}</li>
                @endforeach
            </ul>
        </div>
    </div>


@endsection
