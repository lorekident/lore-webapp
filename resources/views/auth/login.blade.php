@extends('layouts.app')

@section('content')
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-lg">
        <img class="mx-auto w-20 border-4 rounded-full border-green-500" src="{{ asset('images/logo/logo.png') }}" alt="Lore Kid Entrepreneurship">
        <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">{{ __('Grooming Future Millionaires!') }}</h2>
        <p class="mt-2 text-center text-sm text-gray-500">
            {{ __('Let’s continue building your dream') }}
        </p>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-lg">
        <div class="bg-white p-8 rounded-md shadow-md">
            <form class="space-y-6" method="POST" action="{{ route('login') }}">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">{{ __('Email') }}</label>
                    <div class="mt-2">
                        <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus autocomplete="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6" placeholder="Your awesome email">
                        @error('email')
                            <span class="text-red-600 text-xs mt-2 block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">{{ __('Password') }}</label>
                        @if (Route::has('password.request'))
                            <div class="text-sm">
                                <a href="{{ route('password.request') }}" class="font-semibold text-green-600 hover:text-green-500">{{ __('Forgot password?') }}</a>
                            </div>
                        @endif
                    </div>
                    <div class="mt-2">
                        <input id="password" name="password" type="password" required autocomplete="current-password" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6" placeholder="Your secret password">
                        @error('password')
                            <span class="text-red-600 text-xs mt-2 block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="flex items-center">
                    <input class="h-4 w-4 text-green-600 border-gray-300 rounded focus:ring-green-600" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="ml-2 block text-sm text-gray-900" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>

                <div>
                    <button type="submit" class="flex w-full justify-center rounded-md bg-green-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-green-500 active:bg-green-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">
                        {{ __('Let’s Go!') }}
                    </button>
                </div>
            </form>

            <p class="mt-10 text-center text-sm text-gray-500">
                {{ __("New here?") }}
                <a href="{{ route('register') }}" class="text-lg font-semibold underline leading-6 text-green-600 hover:text-green-500">{{ __('Join our crew of future millionaires') }}</a>
            </p>
        </div>
    </div>
</div>
@endsection
