@extends('layouts.app')

@section('content')
    <div class="space-y-4">
        <h2 class="text-3xl font-bold text-slate-900 dark:text-white">
            Catatan Pembelajaran
        </h2>

        <p class="text-slate-500 dark:text-slate-400 mt-2">
            Kelola materi belajar dan buat ringkasan cerdas dengan bantuan AI.
        </p>

        <form method="POST" action="/notes">
            @csrf

            <x-card>
                <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-6">
                    Buat Catatan Baru
                </h3>

                <div class="space-y-4">
                    <div>
                        <label class="block mb-2 text-slate-700 dark:text-slate-300">
                            Judul Catatan
                        </label>

                        <input
                            type="text"
                            name="title"
                            class="w-full border rounded-lg px-4 py-2 bg-white dark:bg-slate-700 border-slate-300 dark:border-slate-600 text-slate-900 dark:text-white transition-colors duration-200"
                        >
                    </div>

                    <div>
                        <label class="block mb-2 text-slate-700 dark:text-slate-300">
                            Isi Materi
                        </label>

                        <textarea
                            rows="6"
                            name="content"
                            class="w-full border rounded-lg px-4 py-2 bg-white dark:bg-slate-700 border-slate-300 dark:border-slate-600 text-slate-900 dark:text-white transition-colors duration-200"
                        ></textarea>
                    </div>
                </div>

                <x-button>
                    Simpan
                </x-button>
            </x-card>
        </form>

        <x-card>
            <h3 class="text-lg font-semibold text-slate-900 dark:text-white mb-4">
                Unggah Dokumen
            </h3>

            <form
                method="POST"
                action="/notes/upload"
                enctype="multipart/form-data"
            >
                @csrf

                <input
                    type="file"
                    name="document"
                    class="block w-full border rounded-lg px-4 py-2 bg-white dark:bg-slate-700 border-slate-300 dark:border-slate-600 text-slate-900 dark:text-white transition-colors duration-200"
                >

                <x-button>
                    Kirim
                </x-button>
            </form>

            <p class="text-slate-500 dark:text-slate-400 mt-4">
                Unggah PDF, dokumen, atau materi belajar untuk diproses dan
                diringkas oleh AI.
            </p>
        </x-card>

        <div>
            <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-4">
                Daftar Catatan
            </h3>

            <div class="space-y-4">
                @forelse ($notes as $note)
                    <x-card>
                        <h4 class="font-semibold text-slate-900 dark:text-white">
                            {{ $note['title'] }}
                        </h4>

                        <p class="text-slate-500 dark:text-slate-400 mt-2">
                            {{ $note['content'] }}
                        </p>

                        <div class="flex gap-2 mt-4">
                            <a href="/notes/{{ $note['id'] }}">
                                <x-button>
                                    Detail
                                </x-button>
                            </a>

                            <form
                                action="/notes/{{ $note->id }}"
                                method="POST"
                            >
                                @csrf
                                @method('DELETE')

                                <x-button class="bg-red-600 dark:bg-red-500">
                                    Hapus
                                </x-button>
                            </form>
                        </div>
                    </x-card>
                @empty
                    <x-card>
                        <p class="text-slate-500 dark:text-slate-400">
                            Belum ada catatan yang dibuat.
                        </p>
                    </x-card>
                @endforelse
            </div>
        </div>
    </div>
@endsection
