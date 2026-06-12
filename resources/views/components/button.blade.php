<button {{
    $attributes->merge([
        'class' => 'px-4 py-2 rounded-lg bg-blue-600 text-white transition-colors duration-200 dark:bg-blue-500'
    ])
}}>
    {{ $slot }}
</button>
