<button {{ $attributes->merge(['type' => 'submit', 'class' => 'tracking-tight px-4 py-2 bg-transparent dark:bg-transparent border border-2 border-primary-one rounded-md font-semibold text-dark dark:text-dark tracking-widest hover:bg-orange-200 dark:hover:bg-orange-200 focus:bg-orange-400 dark:focus:bg-orange-400 active:bg-primary-one dark:active:bg-primary-one focus:outline-none focus:ring-2 focus:ring-primary-one focus:ring-offset-1 dark:focus:ring-offset-primary-one transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
