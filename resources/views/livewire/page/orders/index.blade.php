<div>
    <div class="p-4 rounded-lg card dark:bg-surface-alt">

        <h1 class="flex gap-3">
            <x-icons.banknotes></x-icons.banknotes>
            {{ __('Statistics') }}
        </h1>


        <livewire:page.orders.stats :$filters />

    </div>
    <div class="flex justify-end gap-3 my-10 text-sm">

        <x-dropdown class="w-full md:w-fit">
            <x-dropdown.toggle>
                <button
                    class="flex items-center justify-center w-full gap-3 px-5 py-2 rounded-md md:w-fit bg-surface-alt">
                    <x-icons.chevron-down class="!size-4"></x-icons.chevron-down>
                    {{ $filters->selectedStatus->label() === 'All' ? 'All Status' : $filters->selectedStatus->label() }}
                </button>
            </x-dropdown.toggle>
            <x-dropdown.body
                class="!z-20 h-64 !bg-surface-alt shadow-xl !overflow-scroll  !opacity-100 dark:bg-surface-dark">
                @foreach (FilterStatus::cases() as $status)
                    <label class="flex items-center gap-2 px-4 py-2">
                        <input value="{{ $status->value }}" wire:model.live="filters.selectedStatus" type="radio">
                        {{ $status->label() }}
                    </label>
                @endforeach

            </x-dropdown.body>
        </x-dropdown>

        <x-dropdown class="w-full md:w-fit">
            <x-dropdown.toggle>
                <button
                    class="flex items-center justify-center w-full gap-3 px-5 py-2 rounded-md md:w-fit bg-surface-alt">
                    <x-icons.chevron-down class="!size-4"></x-icons.chevron-down>
                    All Products
                </button>
            </x-dropdown.toggle>
            <x-dropdown.body
                class="!z-20 h-64 !bg-surface-alt shadow-xl !overflow-scroll  !opacity-100 dark:bg-surface-dark">
                @foreach ($filters->products() as $product)
                    <label class="flex items-center gap-2 px-4 py-2">
                        <input value="{{ $product->id }}" wire:model.live="filters.selectedProducts" type="checkbox">
                        {{ $product->name }}
                    </label>
                @endforeach

                <button></button>
            </x-dropdown.body>
        </x-dropdown>
    </div>
    <livewire:page.orders.table :$filters />
    <x-notifications.toasts></x-notifications.toasts>
</div>
