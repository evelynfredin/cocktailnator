@extends('layout.main')

@section('content')

    <div class="flex flex-col justify-center items-center h-full px-5 md:px-0">
        <section class="bg-white mx-5 w-full md:mx-0 md:w-[500px] mt-10 shadow-md py-5 px-8 rounded-xl">

            <div class="flex flex-col justify-center">
                <h2 class="text-center font-black text-4xl my-8">Sign up</h2>

                <a href="/login/twitter" class="btnMenu py-4 rounded-xl text-gray-50 bg-blue-400 flex justify-center hover:bg-blue-500 text-xl">
                    <svg class="left-0 mr-6 w-7 h-7 text-white fill-current" viewBox="0 0 24 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M24 2.368a9.641 9.641 0 01-2.828.794A5.037 5.037 0 0023.337.37a9.717 9.717 0 01-3.127 1.226A4.86 4.86 0 0016.616 0c-3.179 0-5.515 3.041-4.797 6.199C7.728 5.989 4.1 3.979 1.671.924c-1.29 2.27-.669 5.238 1.523 6.741a4.81 4.81 0 01-2.229-.632c-.054 2.34 1.581 4.528 3.949 5.015a4.817 4.817 0 01-2.224.086c.626 2.006 2.444 3.465 4.6 3.506A9.725 9.725 0 010 17.732 13.69 13.69 0 007.548 20c9.142 0 14.307-7.917 13.995-15.018A10.17 10.17 0 0024 2.368z" fill-rule="nonzero"></path>
                    </svg>
                    Sign up with Twitter
                </a>

                <a href="/login/github" class="btnMenu mt-5 py-4 rounded-xl text-gray-50 bg-gray-800 flex justify-center hover:bg-gray-900 text-xl">
                    <svg viewBox="0 0 24 24" class="left-0 mr-6 w-7 h-7 text-white fill-current" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"></path>
                    </svg>
                    Sign up with Github
                </a>
            </div>

            <p class="text-center text-lg text-gray-600 font-bold mt-10">Or, sign up with email</p>
            <form class="text-gray-600 mt-5" action="{{ route('signup') }}" method="POST">
                @csrf
                <div>
                    <label for="name">Name:</label>
                    <input placeholder="Your name" type="text" name="name" id="name" value="{{ old('name') }}">
                </div>

                @error('name')
                    <div class="bg-red-500 text-white p-2 text-center my-2">
                        {{ $message }}
                    </div>
                @enderror

                <div>
                    <label for="email">Email:</label>
                    <input placeholder="Your email" type="email" name="email" id="email" value="{{ old('email') }}">
                </div>

                @error('email')
                    <div class="bg-red-500 text-white p-2 text-center my-2">
                        {{ $message }}
                    </div>
                @enderror

                <div>
                    <label for="password">Password:</label>
                    <input placeholder="Your password" type="password" name="password" id="password">
                </div>

                @error('password')
                    <div class="bg-red-500 text-white p-2 text-center my-2">
                        {{ $message }}
                    </div>
                @enderror

                <div>
                    <label for="password">Confirm password:</label>
                    <input placeholder="Your password, again" type="password" name="password_confirmation" id="password_confirmation">
                </div>

                <div class="mb-5">
                    <button class="btn w-full text-xl rounded-xl hover:bg-indigo-700 px-6">Sign up</button>
                </div>
            </form>
        </section>

        <div class="mt-10 text-sm text-gray-400 text-center">
            <a href="#" class="text-indigo-500 block hover:text-gray-700">Forgot your password?</a>
            Already a member? <a href="{{ route('login') }}" class="text-indigo-500 hover:text-gray-700">Sign in instead</a>
        </div>

    </div>
@endsection
