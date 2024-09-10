<!-- resources/views/layouts/header.blade.php -->
<nav class="bg-white shadow-sm">
    <div class="container mx-auto px-4 py-2 flex justify-between items-center">
        <a class="text-lg font-bold" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button id="menu-toggle" class="lg:hidden p-2 text-gray-600 hover:text-gray-800 focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </button>

        <div id="menu" class="lg:flex lg:items-center lg:space-x-4 hidden lg:block">
            <!-- Left Side Of Navbar -->
            <ul class="flex space-x-4">
                <!-- You can add additional left side items here -->
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="flex space-x-4 ml-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li>
                            <a class="text-gray-700 hover:text-gray-900" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li>
                            <a class="text-gray-700 hover:text-gray-900" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="relative">
                        <button id="user-menu" class="text-gray-700 hover:text-gray-900">
                            {{ Auth::user()->name }}
                            <svg class="w-5 h-5 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                            </svg>
                        </button>

                        <div id="user-menu-dropdown" class="absolute right-0 mt-2 w-48 bg-white shadow-lg hidden">
                            <a class="block px-4 py-2 text-gray-700 hover:bg-gray-100" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

<!-- JavaScript for toggling the menu -->
<script>
    document.getElementById('menu-toggle').addEventListener('click', function() {
        var menu = document.getElementById('menu');
        menu.classList.toggle('hidden');
    });

    document.getElementById('user-menu').addEventListener('click', function() {
        var dropdown = document.getElementById('user-menu-dropdown');
        dropdown.classList.toggle('hidden');
    });
</script>
