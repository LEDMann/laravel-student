<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 border-gray-800 dark:border-gray-200 border rounded-md font-semibold text-xs text-gray-800 dark:text-gray-100 hover:text-gray-100 dark:hover:text-gray-800 uppercase tracking-widest hover:bg-gray-800 dark:hover:bg-gray-100 focus:bg-gray-800 dark:focus:bg-gray-100 active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
