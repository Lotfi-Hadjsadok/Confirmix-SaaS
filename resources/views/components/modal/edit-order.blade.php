<x-modal>
    <x-modal.open>
        <x-dropdown.toggle>
            <x-dropdown.button>Edit</x-dropdown.button>
            <button
                class="w-full p-2 rounded-full md:hidden bg-primary dark:bg-primary-dark ">{{ __('Edit') }}</button>
        </x-dropdown.toggle>
    </x-modal.open>
    <template x-teleport="body">
        <form wire:submit='updateOrder()'>
            <x-modal.dialog>
                <x-modal.header>
                    <h3 id="defaultModalTitle" class="font-semibold tracking-wide text-black dark:text-white">
                        {{ __('Edit Client') }}
                    </h3>
                    <x-modal.close>
                        <button type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true"
                                stroke="currentColor" fill="none" stroke-width="1.4" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </x-modal.close>
                </x-modal.header>

                <x-modal.body>
                    <div class="flex flex-col gap-2 text-black">
                        <x-inputs.text class="bg-gray-200 rounded-xl" wire:model="form.client_name">
                            <x-slot:icon>
                                <x-icons.user></x-icons.user>
                            </x-slot:icon>
                        </x-inputs.text>

                        <x-inputs.text class="bg-gray-200 rounded-xl" wire:model="form.client_state">
                            <x-slot:icon>
                                <x-icons.map-pin></x-icons.map-pin>
                            </x-slot:icon>
                        </x-inputs.text>

                        <x-inputs.text class="bg-gray-200 rounded-xl" wire:model="form.client_city">
                            <x-slot:icon>
                                <x-icons.map-pin></x-icons.map-pin>
                            </x-slot:icon>
                        </x-inputs.text>

                        <x-inputs.text class="bg-gray-200 rounded-xl" type="tel" wire:model="form.client_phone">
                            <x-slot:icon>
                                <x-icons.phone></x-icons.phone>
                            </x-slot:icon>
                        </x-inputs.text>
                        <div class="flex gap-2">
                            <x-inputs.text class="bg-gray-200 rounded-xl" x-mask:dynamic="$money($input,'.','')"
                                wire:model="form.total_price">
                                <x-slot:icon>
                                    <x-icons.banknotes></x-icons.banknotes>
                                </x-slot:icon>
                            </x-inputs.text>
                            <x-inputs.text class="bg-gray-200 rounded-xl" wire:model="form.product_price"
                                x-mask:dynamic="$money($input,'.','')">
                                <x-slot:icon>
                                    <x-icons.currency-dollar></x-icons.currency-dollar>
                                </x-slot:icon>
                            </x-inputs.text>
                            <x-inputs.text class="bg-gray-200 rounded-xl" wire:model="form.shipping_cost"
                                x-mask:dynamic="$money($input,'.','')">
                                <x-slot:icon>
                                    <x-icons.truck></x-icons.truck>
                                </x-slot:icon>
                            </x-inputs.text>
                        </div>
                    </div>
                </x-modal.body>
                <x-modal.footer>
                    <x-modal.close class="w-full">
                        <button type="submit"
                            class="block w-full px-4 py-2 text-sm font-medium tracking-wide text-center transition cursor-pointer bg-primary whitespace-nowrap rounded-xl text-slate-100 hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary active:opacity-100 active:outline-offset-0 dark:bg-primary-dark dark:text-slate-100 dark:focus-visible:outline-primary-dark">{{ __('Update') }}</button>
                    </x-modal.close>
                </x-modal.footer>

            </x-modal.dialog>
        </form>

    </template>

</x-modal>
