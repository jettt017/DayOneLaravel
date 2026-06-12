@extends('layouts.app')

@section('content')
    <div class="space-y-4">
        <h2 class="text-3xl font-bold text-slate-900 dark:text-white mb-2">
            Kuis AI
        </h2>

        <p class="text-slate-600 dark:text-slate-400 mb-6">
            Jawablah pertanyaan berikut sesuai dengan materi yang telah dipelajari.
        </p>

        <form
            method="POST"
            action="{{ route('quiz.submit', $quiz['id']) }}"
            class="space-y-4"
        >
            @csrf
            @foreach ($quiz['questions'] as $index => $question)
                <x-card>
                    <h3 class="font-semibold text-slate-900 dark:text-white mb-4">
                        Pertanyaan {{ $index + 1 }}
                    </h3>

                    <p class="text-slate-700 dark:text-slate-300 mb-4">
                        {{ $question['question'] }}
                    </p>

                    <div class="space-y-2 text-slate-600 dark:text-slate-400">
                        <label class="block">
                            <input
                                type="radio"
                                name="answers[{{ $index }}]"
                                value="A"
                            >

                            A. {{ $question['option_a'] }}
                        </label>

                        <label class="block">
                            <input
                                type="radio"
                                name="answers[{{ $index }}]"
                                value="B"
                            >

                            B. {{ $question['option_b'] }}
                        </label>

                        <label class="block">
                            <input
                                type="radio"
                                name="answers[{{ $index }}]"
                                value="C"
                            >

                            C. {{ $question['option_c'] }}
                        </label>

                        <label class="block">
                            <input
                                type="radio"
                                name="answers[{{ $index }}]"
                                value="D"
                            >

                            D. {{ $question['option_d'] }}
                        </label>
                    </div>
                </x-card>
            @endforeach

            <x-button>
                Kirim Jawaban
            </x-button>
        </form>
    </div>
@endsection
