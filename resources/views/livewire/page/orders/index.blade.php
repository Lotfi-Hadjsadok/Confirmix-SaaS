<div>
    <div class="p-4 rounded-lg card dark:bg-surface-alt">

        <h1 class="flex gap-3">
            <x-icons.banknotes></x-icons.banknotes>
            {{ __('Statistics') }}
        </h1>

    </div>

    <div x-data="{ checkAll: false }" class="w-full mt-10 border rounded-xl border-slate-300 dark:border-slate-700">
        <x-table>
            <x-table.header></x-table.header>
            <tbody class="divide-y divide-slate-300 dark:divide-slate-700">
                @foreach ($orders as $order)
                    <livewire:page.orders.order-row @deleteOrder="deleteOrder($event.detail.order_id)"
                        wire:key='{{ $order->id }}' @updated="$refresh" :order="$order" />
                @endforeach
            </tbody>
        </x-table>
    </div>

    <div class="mt-10">
        {{ $orders->links() }}
    </div>

    <!-- Notifications -->
    <x-notifications.toasts></x-notifications.toasts>

</div>
