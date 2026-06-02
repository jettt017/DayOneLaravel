@extends('layouts.app')

@section('content')
<div class="space-y-4">
    <h2 class="text-3xl font-bold mb-2 text-slate-800 dark:text-white">
        Pertanyaan
    </h2>

    <x-card>
        <h3 class="font-semibold mb-4 text-slate-800 dark:text-white text-lg">Soal 1</h3>
        <p class="mb-6 text-slate-700 dark:text-slate-300">Apa itu composer?</p>

        <div class="space-y-3 text-slate-700 dark:text-slate-300">
            <div class="p-4 rounded-lg border border-slate-200 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-700 transition-colors cursor-pointer">
                <strong>A.</strong> Sebuah Package manager untuk PHP
            </div>
            <div class="p-4 rounded-lg border border-slate-200 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-700 transition-colors cursor-pointer">
                <strong>B.</strong> Bawaan Aplikasi Node JS
            </div>
            <div class="p-4 rounded-lg border border-slate-200 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-700 transition-colors cursor-pointer">
                <strong>C.</strong> Package Manajer Node JS
            </div>
            <div class="p-4 rounded-lg border border-slate-200 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-700 transition-colors cursor-pointer">
                <strong>D.</strong> Package Manajer untuk Install Next JS
            </div>
        </div>
    </x-card>
</div>
@endsection