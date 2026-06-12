@extends('layouts.app')

@section('content')
    <div class="space-y-4">
        <h2 class="text-3xl font-bold text-slate-900 dark:text-white mb-2">
            Kuis AI
        </h2>

        <p class="text-slate-600 dark:text-slate-400 mb-8">
            Uji pemahamanmu melalui kuis yang dibuat secara otomatis oleh AI.
        </p>

        <div class="space-y-4">
            @forelse ($quizzes as $quiz)
                <x-card>
                    <h3 class="font-bold text-slate-900 dark:text-white">
                        {{ $quiz->note->title }}
                    </h3>

                    <p class="text-slate-500 dark:text-slate-400">
                        {{ count($quiz->questions) }} Pertanyaan
                    </p>

                    <div class="flex gap-2 mt-4">
                        <a href="/quiz/{{ $quiz['id'] }}">
                            <x-button>
                                Mulai Kuis
                            </x-button>
                        </a>

                        <x-button class="bg-red-600 dark:bg-red-500">
                            Hapus
                        </x-button>
                    </div>
                </x-card>
            @empty
                <x-card>
                    <p class="text-slate-500 dark:text-slate-400">
                        Belum ada quiz tersedia
                    </p>
                </x-card>
            @endforelse
        </div>
    </div>
@endsection
