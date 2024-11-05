<div x-data="{ isOpen: false, openedWithKeyboard: false }" {{ $attributes->class('relative') }}
    @keydown.esc.window="isOpen = false, openedWithKeyboard = false">
    {{ $slot }}
</div>
