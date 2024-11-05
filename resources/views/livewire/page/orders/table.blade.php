<div>
    <div x-data="{ checkAll: false }" class="w-full overflow-x-auto border rounded-xl border-slate-300 dark:border-slate-700">
        <x-table>
            <x-table.header>
                <tr>
                    <th scope="col" class="p-4">
                        <label for="checkAll"
                            class="flex items-center cursor-pointer text-slate-700 dark:text-slate-300 ">
                            <div class="relative flex items-center">
                                <input type="checkbox" x-model="checkAll">

                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true"
                                    stroke="currentColor" fill="none" stroke-width="4"
                                    class="absolute invisible -translate-x-1/2 -translate-y-1/2 pointer-events-none left-1/2 top-1/2 size-3 text-slate-100 peer-checked:visible dark:text-slate-100">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                            </div>
                        </label>
                    </th>
                    <th class="p-4">{{ __('Client') }}</th>
                    <th class="p-4">{{ __('Product') }}</th>
                    <th class="p-4">{{ __('Total') }}</th>
                    <th class="p-4">{{ __('Note') }}</th>
                    @if (Auth::user()->is_employer)
                        <th class="p-4">{{ __('Employee') }}</th>
                    @endif
                    <th class="p-4">{{ __('Status') }}</th>
                    <th class="p-4"></th>
                </tr>
            </x-table.header>
            <tbody class="divide-y divide-slate-300 dark:divide-slate-700">
                @foreach ($orders as $order)
                    <livewire:page.orders.order-row @deleteOrder="deleteOrder($event.detail.order_id)"
                        wire:key='{{ $order->id }}' @updated="$refresh" :order="$order" />
                @endforeach
            </tbody>
        </x-table>
    </div>

    <div class="mt-10">
        {{ $orders->links('livewire.pagination') }}
    </div>
</div>
