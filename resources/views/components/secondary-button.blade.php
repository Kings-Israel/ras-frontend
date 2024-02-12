<button {{ $attributes->merge(['type' => 'button', 'class' => 'px-4 py-2 bg-white dark:bg-white border border-gray-300 dark:border-gray-300 rounded-md text-dark tracking-tight dark:text-dark tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-200 focus:ring-offset-1 dark:focus:ring-offset-gray-400 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
