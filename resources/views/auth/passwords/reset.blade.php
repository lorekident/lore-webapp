@extends('layouts.app')

@section('content')
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <img class="mx-auto w-20 border-4 rounded-full border-green-500" src="{{ asset('images/logo/logo.png') }}" alt="Lore Kid Entrepreneurship">
        <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">{{ __('Reset Password') }}</h2>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white p-8 rounded-md shadow-md">
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="mb-6">
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">{{ __('Email Address') }}</label>
                    <div class="mt-2">
                        <input id="email" name="email" type="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6 @error('email') border-red-500 @enderror">
                        @error('email')
                            <span class="text-red-600 text-xs mt-2 block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">{{ __('Password') }}</label>
                    <div class="mt-2">
                        <input id="password" name="password" type="password" required autocomplete="new-password" value="{{ $password ?? old('password') }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6 @error('password') border-red-500 @enderror">
                        @error('password')
                            <span class="text-red-600 text-xs mt-2 block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="mb-6">
                    <label for="password-confirm" class="block text-sm font-medium leading-6 text-gray-900">{{ __('Confirm Password') }}</label>
                    <div class="mt-2">
                        <input id="password-confirm" name="password_confirmation" type="password" required autocomplete="new-password" value="{{ $password_confirmation ?? old('password_confirmation') }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <button type="submit" class="flex w-full justify-center rounded-md bg-green-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">
                        {{ __('Reset Password') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
