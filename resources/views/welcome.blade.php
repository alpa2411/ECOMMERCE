<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel E-commerce</title>
    @vite('resources/css/app.css')
</head>
<body class="antialiased bg-gray-100 dark:bg-gray-900">

    <div class="relative flex items-top justify-center min-h-screen sm:items-center py-4 sm:pt-0">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 text-center">

            {{-- ✅ Show flash success message --}}
            @if(session('status'))
                <p class="mb-4 text-green-600 font-semibold">
                    {{ session('status') }}
                </p>
            @endif

            <h1 class="text-4xl font-bold text-gray-800 dark:text-gray-200">
                🚀 Welcome to Laravel E-commerce
            </h1>

            {{-- ✅ Show login/register if not logged in --}}
            @guest
                <p class="mt-4 text-lg text-gray-600 dark:text-gray-400">
                    Please 
                    <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Login</a>
                    or 
                    <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Register</a>
                    to continue.
                </p>
            @endguest

            {{-- ✅ Show logout if logged in --}}
            @auth
                <p class="mt-4 text-lg text-gray-600 dark:text-gray-400">
                    Welcome back, <span class="font-bold">{{ Auth::user()->name }}</span> 🎉
                </p>

                <form action="{{ route('logout') }}" method="POST" class="mt-6">
                    @csrf
                    <button type="submit" 
                        class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                        Logout
                    </button>
                </form>
            @endauth

        </div>
    </div>

</body>
</html>
