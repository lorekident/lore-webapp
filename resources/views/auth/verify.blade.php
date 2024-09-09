@extends('layouts.app')

@section('content')
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <img class="mx-auto w-20 border-4 rounded-full border-green-500" src="{{ asset('images/logo/logo.png') }}" alt="Lore Kid Entrepreneurship">
        <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">{{ __('Verify Your Email Address') }}</h2>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white p-8 rounded-md shadow-md">
            @if (session('resent'))
                <div class="text-green-600 text-sm mb-4 p-4 border border-green-300 rounded bg-green-50" role="alert">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
            @endif

            <p class="text-gray-900 mb-4">
                {{ __('Before proceeding, please check your email for a verification link.') }}
                {{ __('If you did not receive the email') }},
                <form class="inline" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit" class="font-semibold text-green-600 hover:text-green-500">
                        {{ __('click here to request another') }}
                    </button>.
                </form>
            </p>
        </div>
    </div>
</div>
@endsection
