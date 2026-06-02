<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>{{ config('app.name', 'Laravel') }}</title>

        @if(file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
            @laravelPWA
        @endif

    </head>
    <body>
        <div class="flex min-h-screen">
            <aside class="hidden md:block w-64 bg-slate-800 text-white p-6" id="aside">
                <div>
                    <h1 class="text-x font-bold mb-6">
                        Smart Notes AI
                    </h1>

                    <nav>
                        <a href="/" class="block">Dashboard</a>
                        <a href="/notes" class="block">Notes</a>
                        <a href="/quiz" class="block">Quiz</a>
                    </nav>
                </div>
            </aside>

            <main class="flex-1 bg-slate-100">
                <header class="bg-white border-b px-6 py-4 flex justify-between">
                    <div class="flex gap-2">
                        <button class="md:hidden" id="menu-button">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                        </button>

                        <h2 class="font-semibold">
                            Smart Notes AI
                        </h2>
                    </div>

                    <span>Hello, {{ session('username') }}</span>
                </header>

                <div class="p-4">
                    @yield('content')
                </div>
            </main>
        </div>
    </body>
</html>
