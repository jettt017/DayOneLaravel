@extends('layouts.app')

@section('content')
    <div class="space-y-6">
        <div>
            <a
                href="/notes"
                class="text-indigo-600 dark:text-indigo-400"
            >
                kembali
            </a>
        </div>

        <x-card>
            <h2 class="text-xl font-bold text-slate-900 dark:text-white">
                {{ $note['title'] }}
            </h2>

            @if (! empty($note['content']))
                <p class="text-slate-600 dark:text-slate-300 leading-relaxed mt-4">
                    {{ $note['content'] }}
                </p>
            @else
                <div>
                    <p class="mt-4 text-slate-500 dark:text-slate-400">
                        Dokumen Berhasil Diunggah
                    </p>

                    <p class="text-sm text-slate-400 dark:text-slate-50">
                        {{ basename($note['document']) }}
                    </p>
                </div>
            @endif
        </x-card>

        <x-card>
            <h3 class="text-lg font-semibold text-slate-900 dark:text-white mb-4">
                Fitur Ai
            </h3>

            <div class="flex gap-2">
                @if (! $note['summary'])
                    <a href="/notes/{{ $note['id'] }}/summary">
                        <x-button>
                            Ringkas AI
                        </x-button>
                    </a>
                @endif

                <a href="/notes/{{ $note['id'] }}/quiz">
                    <x-button class="bg-emerald-600 dark:bg-emerald-500">
                        Quiz AI
                    </x-button>
                </a>
            </div>
        </x-card>

        @if ($note['summary'])
            <x-card>
                <h3 class="text-lg font-semibold text-slate-900 dark:text-white">
                    Ringkasan AI
                </h3>

                <p class="text-slate-600 dark:text-slate-300 leading-relaxed">
                    {!! $note['summary'] !!}
                </p>
            </x-card>
        @endif
    </div>
@endsection
