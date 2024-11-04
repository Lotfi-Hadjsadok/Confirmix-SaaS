<div x-cloak x-show="modalIsOpen" x-transition.opacity.duration.200ms x-trap.inert.noscroll="modalIsOpen"
    @keydown.esc.window="modalIsOpen = false" @click.self="modalIsOpen = false"
    class="fixed inset-0 z-30 flex items-end justify-center p-4 pb-8 bg-black/20 backdrop-blur-md sm:items-center lg:p-8"
    role="dialog" aria-modal="true" aria-labelledby="defaultModalTitle">
    <div x-show="modalIsOpen"
        x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        class="flex flex-col max-w-lg gap-4 overflow-hidden bg-white border rounded-xl border-slate-300 text-slate-700 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300">
        {{ $slot }}
    </div>
</div>
