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
                <button 
                    id="btn-ringkas" 
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors duration-200 cursor-pointer {{ $note['summary'] ? 'hidden' : '' }}"
                    onclick="startSummaryStream()"
                >
                    Ringkas AI
                </button>

                <a href="/notes/{{ $note['id'] }}/quiz">
                    <x-button class="bg-emerald-600 dark:bg-emerald-500">
                        Quiz AI
                    </x-button>
                </a>
            </div>
        </x-card>

        <div id="summary-card" class="bg-white dark:bg-slate-800 p-6 rounded-xl shadow dark:border dark:border-slate-700 dark:text-white transition-colors duration-200 {{ $note['summary'] ? '' : 'hidden' }}">
            <h3 class="text-lg font-semibold text-slate-900 dark:text-white mb-4">
                Ringkasan AI
            </h3>

            <div id="summary-content" class="text-slate-600 dark:text-slate-300 leading-relaxed whitespace-pre-line prose dark:prose-invert">
                {!! $note['summary'] !!}
            </div>
            
            <div id="summary-loading" class="hidden items-center gap-3 text-slate-500 dark:text-slate-400 mt-4">
                <svg class="animate-spin h-5 w-5 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <span class="animate-pulse">AI sedang menganalisis & menulis ringkasan...</span>
            </div>
        </div>
    </div>

    <script>
        function startSummaryStream() {
            const btn = document.getElementById('btn-ringkas');
            const card = document.getElementById('summary-card');
            const content = document.getElementById('summary-content');
            const loading = document.getElementById('summary-loading');

            btn.classList.add('hidden');
            card.classList.remove('hidden');
            content.innerHTML = '';
            loading.classList.remove('hidden');
            loading.classList.add('flex');

            const eventSource = new EventSource("/notes/{{ $note['id'] }}/summary/stream");
            
            let fullText = '';

            eventSource.onmessage = function (event) {
                if (event.data === '[DONE]') {
                    eventSource.close();
                    loading.classList.add('hidden');
                    loading.classList.remove('flex');
                    // Reload so that Laravel's backend-rendered Str::markdown is loaded perfectly
                    window.location.reload();
                    return;
                }

                try {
                    const data = JSON.parse(event.data);
                    if (data.type === 'text_delta') {
                        fullText += data.delta;
                        content.innerHTML = fullText;
                    }
                } catch (e) {
                    console.error('Error parsing stream chunk:', e);
                }
            };

            eventSource.onerror = function (err) {
                console.error('EventSource failed:', err);
                eventSource.close();
                loading.classList.add('hidden');
                loading.classList.remove('flex');
                content.innerHTML = '<span class="text-red-500 font-semibold">Gagal memproses streaming dari AI. Pastikan server Anda aktif.</span>';
            };
        }
    </script>
@endsection
