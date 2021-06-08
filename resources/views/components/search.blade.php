<section>
    <form action="{{ route('search') }}" class="flex justify-self-center w-full md:w-[700px] mx-auto" method="GET">
        <input class="mt-0 mb-0 rounded-r-none -mr-8" type="search" name="search" placeholder="Vodka, gin, lime"
               value="{{ request('search') }}">
        <button class="btnMenu bg-indigo-500 px-6 py-3 rounded-2xl  text-white hover:bg-indigo-700" type="submit">Search</button>
    </form>
</section>
