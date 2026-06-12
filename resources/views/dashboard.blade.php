@extends('layouts.app')

@section('content')
    <div class="space-y-4">
        <h2 class="text-3xl font-bold text-slate-900 dark:text-white mb-2">
            Selamat Datang Kembali
        </h2>

        <p class="text-slate-600 dark:text-slate-400 mb-8">
            Siap melanjutkan proses belajar hari ini?
        </p>

        <div class="grid md:grid-cols-3 gap-6">
            <x-card>
                <p class="text-slate-500 dark:text-slate-400">
                    Total Catatan
                </p>

                <h3 class="text-3xl font-bold text-slate-900 dark:text-white mt-2">
                    {{ $totalNotes }}
                </h3>
            </x-card>

            <x-card>
                <p class="text-slate-500 dark:text-slate-400">
                    Total Quiz
                </p>

                <h3 class="text-3xl font-bold text-slate-900 dark:text-white mt-2">
                    {{ $totalQuizzes }}
                </h3>
            </x-card>

            <x-card>
                <p class="text-slate-500 dark:text-slate-400">
                    Total Ringkasan AI
                </p>

                <h3 class="text-3xl font-bold text-slate-900 dark:text-white mt-2">
                    {{ $totalSummaries }}
                </h3>
            </x-card>
        </div>

        <x-card>
            <h3 class="font-bold text-slate-900 dark:text-white mb-4">
                Catatan Terbaru
            </h3>

            <ul class="space-y-3 text-slate-700 dark:text-slate-300">
                @forelse ($latestNotes as $note)
                    <li>
                        {{ $note->title }}
                    </li>
                @empty
                    <li>
                        Belum ada catatan yang dibuat.
                    </li>
                @endforelse
            </ul>
        </x-card>
    </div>
@endsection
