@if (Session::has('status'))
    <div class="bg-green-500 text-gray-50 my-5 text-center">
        <p class="py-2 px-3">{{ Session::get('status') }}</p>
    </div>
@elseif (Session::has('error'))
    <div class="bg-red-500 text-gray-50 my-5 text-center">
        <p class="py-2 px-3">{{ Session::get('error') }}</p>
    </div>
@endif
