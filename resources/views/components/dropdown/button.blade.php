<button
    {{ $attributes->merge(['class' => 'hidden w-full px-4 py-2 text-sm text-left md:block bg-slate-100 hover:bg-slate-800/5 hover:text-black focus-visible:bg-slate-800/10 focus-visible:text-black focus-visible:outline-none dark:bg-surface-alt dark:text-slate-200 dark:hover:bg-slate-100/5 dark:hover:text-white dark:focus-visible:bg-slate-100/10 dark:focus-visible:text-white']) }}>
    {{ $slot }}
</button>
