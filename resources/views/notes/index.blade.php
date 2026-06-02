@extends('layouts.app')

@section('content')
<div class="space-y-4">
    <h2 class="text-3xl font-bold text-slate-800 dark:text-white">
        Notes
    </h2>

    <p class="text-slate-500 dark:text-slate-400 mt-2">
        Buat Catatanmu jadi lebih berwarna
    </p>

    <x-card>
        <h3 class="text-lg font-bold mb-6 text-slate-800 dark:text-white">Tambahkan Catatan</h3>

        <div class="space-y-4 mb-4">
            <div>
                <label class="block mb-2 text-slate-700 dark:text-slate-300 font-medium">Judul</label>
                <input type="text" name="title" class="w-full border border-slate-300 dark:border-slate-700 dark:bg-slate-900 dark:text-white rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block mb-2 text-slate-700 dark:text-slate-300 font-medium">Isi Catatan</label>
                <textarea rows="6" name="content" class="w-full border border-slate-300 dark:border-slate-700 dark:bg-slate-900 dark:text-white rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
            </div>
        </div>

        <x-button>Simpan</x-button>
    </x-card>

    <x-card>
        <h3 class="text-lg font-semibold text-slate-800 dark:text-white mb-4">Upload Catatan</h3>
        <input type="file" class="block w-full border border-slate-300 dark:border-slate-700 dark:bg-slate-900 dark:text-white rounded-lg px-4 py-2 file:mr-4 file:py-1 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 dark:file:bg-slate-700 dark:file:text-blue-300">
        <p class="text-slate-500 dark:text-slate-400 mt-4">Upload Catatan Yang ingin anda simpulkan</p>
    </x-card>

    <div>
        <h3 class="text-xl font-bold mb-4 text-slate-800 dark:text-white">Catatan Saya</h3>

        <div class="space-y-4">
            <x-card>
                <h4 class="text-lg font-bold text-slate-800 dark:text-white">Belajar Laravel</h4>
                <p class="text-slate-600 dark:text-slate-300 mt-2">Saya sedang belajar laravel</p>
                <div class="flex flex-wrap gap-2 mt-4">
                    <x-button>
                        Simpulkan Menggunakan AI
                    </x-button>
                    <x-button class="bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-600 dark:hover:bg-emerald-700">
                        Buat Quiz dengan AI
                    </x-button>
                    <x-button class="bg-red-600 hover:bg-red-700 dark:bg-red-600 dark:hover:bg-red-700">
                        Hapus
                    </x-button>
                </div>
            </x-card>

            <x-card>
                <h4 class="text-lg font-bold text-slate-800 dark:text-white">Belajar Node JS</h4>
                <p class="text-slate-600 dark:text-slate-300 mt-2">Saya sedang belajar Node JS dengan framework Next JS</p>
                <div class="flex flex-wrap gap-2 mt-4">
                    <x-button>
                        Simpulkan Menggunakan AI
                    </x-button>
                    <x-button class="bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-600 dark:hover:bg-emerald-700">
                        Buat Quiz dengan AI
                    </x-button>
                    <x-button class="bg-red-600 hover:bg-red-700 dark:bg-red-600 dark:hover:bg-red-700">
                        Hapus
                    </x-button>
                </div>
            </x-card>
        </div>
    </div>
</div>
@endsection