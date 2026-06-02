<button
    {{ 
        $attributes->merge([
            'class' => 'bg-blue-600 hover:bg-blue-700 dark:bg-blue-600 dark:hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors duration-200'
        ])
    }}
>
    {{ $slot }}
</button>
