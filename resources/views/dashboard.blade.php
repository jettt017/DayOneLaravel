@extends('layouts.app')

@section('content')
<div class="space-y-4">
    <h2 class="text-3xl font-bold mb-2 text-slate-800 dark:text-white">
        Welcome Back
    </h2>

    <p class="text-slate-600 dark:text-slate-400 mb-8">
        Ready to learn today?
    </p>

    <div class="grid md:grid-cols-3 gap-6">
        <x-card>
            <p class="text-slate-500 dark:text-slate-400 font-medium">
                Total Catatan
            </p>
            <h3 class="text-3xl font-bold mt-2 text-slate-800 dark:text-white">
                12
            </h3>
        </x-card>

        <x-card>
            <p class="text-slate-500 dark:text-slate-400 font-medium">
                Total Quiz
            </p>
            <h3 class="text-3xl font-bold mt-2 text-slate-800 dark:text-white">
                13
            </h3>
        </x-card>

        <x-card>
            <p class="text-slate-500 dark:text-slate-400 font-medium">
                Total Keseluruhan
            </p>
            <h3 class="text-3xl font-bold mt-2 text-slate-800 dark:text-white">
                14
            </h3>
        </x-card>
    </div>

    <x-card>
        <h3 class="font-bold mb-4 text-slate-800 dark:text-white">Aktifitas Terbaru</h3>

        <ul class="space-y-3 text-slate-700 dark:text-slate-300">
            <li class="flex items-center gap-2">
                <span class="size-1.5 rounded-full bg-blue-600"></span>
                Membuat Quiz
            </li>
            <li class="flex items-center gap-2">
                <span class="size-1.5 rounded-full bg-blue-600"></span>
                Mengupload Image
            </li>
        </ul>
    </x-card>
</div>

@endsection
