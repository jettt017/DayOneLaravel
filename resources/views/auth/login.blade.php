@extends('layouts.auth')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-slate-100 dark:bg-slate-900 transition-colors duration-200">
    <div class="bg-white dark:bg-slate-800 p-8 rounded-xl shadow-md w-full max-w-md dark:border dark:border-slate-700 dark:text-white transition-colors duration-200">
        <h1 class="text-2xl font-bold mb-6 text-slate-800 dark:text-white">Smart Notes AI</h1>
        <form method="POST" action="/login">
            @csrf

            <div class="mb-4">
                <label class="block mb-2 text-slate-700 dark:text-slate-300 font-medium">Username</label>
                <input type="text" name="username" class="w-full border border-slate-300 dark:border-slate-700 dark:bg-slate-900 dark:text-white rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label class="block mb-2 text-slate-700 dark:text-slate-300 font-medium">Password</label>
                <input type="password" name="password" class="w-full border border-slate-300 dark:border-slate-700 dark:bg-slate-900 dark:text-white rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <x-button class="w-full">
                Login
            </x-button>
        </form>
    </div>
</div>
@endsection
