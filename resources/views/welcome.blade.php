<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Student') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script>
            // On page load or when changing themes, best to add inline in `head` to avoid FOUC
            if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark')
            }
        </script>
    </head>
    <body class="h-screen bg-gray-200 dark:bg-gray-900 flex flex-col">
        <x-theme-toggle/>
        <div class="relative place-content-center justify-center items-center w-1/4 m-auto">
            <div class="max-w-7xl mx-auto p-6 lg:p-8">
                @if (Route::has('login'))
                    <div class="flex flex-col justify-center p-6 rounded-lg bg-gray-300 dark:bg-gray-800">
                        @auth
                            <div class="text-center text-xl p-6 text-gray-800 dark:text-gray-100">{{ __("Welcome to the Student App!") }}</div>
                            <div class="text-center p-6 text-gray-600 dark:text-gray-200">{{ __("please visit the dashboard to get started") }}</div>
                            <a href="{{ route('course.list.all') }}" class="text-center w-min font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                        @else
                            <div class="text-center text-xl p-6 text-gray-800 dark:text-gray-100">{{ __("Welcome to the Student App!") }}</div>
                            <div class="text-center p-6 text-gray-600 dark:text-gray-200">{{ __("please login or register to get started") }}</div>
                            <div class="flex flex-row justify-center">
                                <a href="{{ route('login') }}" class="text-center font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="text-center ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                                @endif
                            </div>
                        @endauth
                    </div>
                @endif
            </div>
        </div>
    </body>
</html>
