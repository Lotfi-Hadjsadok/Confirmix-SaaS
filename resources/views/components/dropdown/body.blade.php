<div x-cloak x-show="isOpen || openedWithKeyboard" x-transition x-trap="openedWithKeyboard"
    @click.outside="isOpen = false, openedWithKeyboard = false" @keydown.down.prevent="$focus.wrap().next()"
    @keydown.up.prevent="$focus.wrap().previous()"
    class="absolute z-10 top-11 right-0 flex w-full min-w-[12rem] flex-col overflow-hidden rounded-xl border border-slate-300 bg-slate-100 py-1.5 dark:border-surface-alt dark:bg-surface-alt"
    role="menu">
    {{ $slot }}
</div>
