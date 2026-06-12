@extends('layouts.app')

@section('content')
    <div class="space-y-4">
        <x-card>
            <h2 class="text-3xl font-bold text-slate-900 dark:text-white">
                Hasil Quiz
            </h2>

            <p class="text-slate-600 dark:text-slate-400 mt-4">
                Skor Anda
            </p>

            <h3 class="text-5xl font-bold text-indigo-600 mt-2">
                {{ $score }} / {{ $total }}
            </h3>
        </x-card>

        @foreach ($results as $index => $result)
            <x-card>
                <h4 class="font-semibold text-slate-900 dark:text-white mb-4">
                    Soal {{ $index + 1 }}
                </h4>

                @if ($result['is_correct'])
                    <div class="text-green-600 font-medium">
                        Jawaban Benar
                    </div>
                @else
                    <div class="text-red-600 font-medium">
                        Jawaban Salah
                    </div>

                    <div class="text-slate-600 dark:text-slate-400">
                        Jawaban Anda:
                        {{ $result['user_answer'] }}
                    </div>

                    <div class="text-slate-600 dark:text-slate-400">
                        Jawaban Benar:
                        {{ $result['correct_answer'] }}
                    </div>
                @endif
            </x-card>
        @endforeach
    </div>
@endsection
