<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">

        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0"
        >

        <title>
            {{ config('app.name', 'Laravel') }}
        </title>

        <script>
            document.documentElement.classList.toggle(
                'dark',
                localStorage.theme === 'dark' ||
                (
                    ! ('theme' in localStorage) &&
                    window.matchMedia('(prefers-color-scheme: dark)').matches
                )
            );
        </script>

        @if (
            file_exists(public_path('build/manifest.json')) ||
            file_exists(public_path('hot'))
        )
            @vite([
                'resources/css/app.css',
                'resources/js/app.js',
            ])

            @laravelPWA
        @endif
    </head>

    <body class="bg-slate-100 dark:bg-slate-900 transition-colors duration-200">
        <div class="flex min-h-screen">
            <aside
                id="aside"
                class="hidden md:block w-64 bg-slate-800 text-white p-6 transition-colors duration-200"
            >
                <div>
                    <h1 class="text-xl font-bold mb-6">
                        Smart Notes AI
                    </h1>

                    <nav class="space-y-2">
                        <a href="/" class="block">
                            Dashboard
                        </a>

                        <a href="/notes" class="block">
                            Notes
                        </a>

                        <a href="/quiz" class="block">
                            Quiz
                        </a>

                        <form
                            action="/logout"
                            method="POST"
                            class="mt-6"
                        >
                            @csrf

                            <x-button class="w-full bg-red-600 dark:bg-red-500">
                                Logout
                            </x-button>
                        </form>
                    </nav>
                </div>
            </aside>

            <main class="flex-1 bg-slate-100 dark:bg-slate-900 transition-colors duration-200">
                <header
                    class="bg-white dark:bg-slate-800 border-b dark:border-slate-700 px-6 py-4 flex justify-between items-center transition-colors duration-200"
                >
                    <div class="flex items-center gap-4">
                        <button
                            id="menu-button"
                            class="md:hidden"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="size-6 dark:text-white"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"
                                />
                            </svg>
                        </button>

                        <h2 class="font-semibold text-slate-900 dark:text-white">
                            Smart Notes AI
                        </h2>
                    </div>

                    <div class="flex items-center gap-4">
                        <x-theme-toggle />

                        <span class="text-slate-700 dark:text-slate-300">
                            Hello, {{ session('username') }}
                        </span>
                    </div>
                </header>

                <div class="p-4">
                    @yield('content')
                </div>
            </main>
        </div>
    </body>
</html>
