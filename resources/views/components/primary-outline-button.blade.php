<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center tracking-tight px-4 py-2 bg-transparent dark:bg-transparent border border-2 border-orange-500 rounded-md font-semibold text-dark dark:text-dark tracking-widest hover:bg-orange-200 dark:hover:bg-orange-200 focus:bg-orange-400 dark:focus:bg-orange-400 active:bg-orange-500 dark:active:bg-orange-500 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-1 dark:focus:ring-offset-orange-500 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
