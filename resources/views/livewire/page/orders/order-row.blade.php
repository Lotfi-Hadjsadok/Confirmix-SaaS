    <tr class="*:p-0 relative grid items-center gap-5 p-4 md:p-0 grid-cols-3 md:table-row">
        <td class="hidden md:table-cell">
            <!-- Loading -->
            <div wire:loading.delay class="absolute inset-0 z-20 opacity-50 bg-surface-alt"></div>

            <label class="flex items-center cursor-pointer md:p-4 text-slate-700 dark:text-slate-300 ">
                <div class="relative flex items-center">
                    <input type="checkbox" :checked="checkAll">
                </div>
            </label>

        </td>
        <td class="col-span-3 min-w-32 text-nowrap">
            <div class="flex flex-col gap-2 text-sm md:p-4">
                <p class="flex items-center gap-1">
                    <x-icons.user class="size-5" />
                    {{ $order->client->name }}
                </p>
                <p class="flex items-center gap-1">
                    <x-icons.map-pin class="size-5" />
                    {{ $order->client->state }} | {{ $order->client->city }}
                </p>
                <a href="tel:{{ $order->client->phone }}" class="flex items-center gap-1 dark:hover:text-primary-dark">
                    <x-icons.phone class="size-5" />
                    {{ $order->client->phone }}
                </a>
            </div>
        </td>
        <td class="md:p-4">
            <div class="flex flex-col gap-1 text-sm">
                <x-icons.shopping-cart class="md:hidden"></x-icons.shopping-cart>
                <p>{{ $order->product->name }}</p>

            </div>
        </td>
        <td>
            <div class="flex flex-col gap-1 text-sm md:p-4 text-nowrap">
                <p class="flex items-center gap-1 text-base text-primary dark:text-primary-dark">
                    <x-icons.banknotes class="mt-[1px] size-6" />
                    {{ withCurrency($order->total_price) }}
                </p>

                <p class="flex items-center gap-1">
                    <x-icons.currency-dollar class="mt-[1px] size-5" />
                    1 x {{ withCurrency($order->product_price) }}
                </p>

                <p class="flex items-center gap-1">
                    <x-icons.truck class="mt-[1px] size-5" />
                    {{ withCurrency($order->shipping_cost) }}
                </p>
            </div>
        </td>
        <td class="md:min-w-32">
            <div class="flex flex-col md:p-4 ">
                <textarea wire:model="form.note" wire:change='updateNote()' placeholder="{{ __('Note') }}"
                    class="text-xs  [&:not(:placeholder-shown)]:border-primary dark:[&:not(:placeholder-shown)]:border-primary-dark  resize-none md:w-32 dark:bg-surface-alt">{{ $order->note }}</textarea>
            </div>
        </td>

        @if (Auth::user()->is_employer)
            <td class="w-full col-span-3 md:p-4 md:w-fit">
                <select required wire:model='form.employee' wire:change='updateEmployee()'
                    class="w-full text-xs rounded-lg dark:bg-surface-alt">
                    <option selected disabled value="">{{ __('Switch Employee') }}</option>
                    @foreach (Auth::user()->employer->employees as $employee)
                        <option @selected($employee->id == $order->employee_id) value="{{ $employee->id }}">{{ $employee->user->name }}
                        </option>
                    @endforeach
                </select>
            </td>
        @endif

        <td class="w-full col-span-3 md:w-32">
            <form class="relative h-9 md:p-4 md:h-0">
                <select wire:loading.attr='disabled' wire:model='form.status' wire:change='updateStatus()'
                    class="absolute inset-0 z-10 opacity-0">
                    @foreach (OrderStatus::cases() as $status)
                        <option value="{{ $status->value }}">{{ $status->label() }}</option>
                    @endforeach
                </select>
                <p
                    class="absolute inset-0 h-9 flex justify-center items-center  md:h-fit p-2 w-full md:w-28 text-xs  rounded-full -z-10 {{ $this->order->status->color() }}">
                    {{ $this->order->status->label() }}
                </p>

            </form>
        </td>

        <td class="col-span-3 md:p-4">
            @if ($agent->isDesktop())
                <x-dropdown>
                    <x-dropdown.toggle>
                        <button class="hidden p-1 rounded-full md:block">
                            <x-icons.ellipsis-horizontal class="size-8"></x-icons.ellipsis-horizontal>
                        </button>
                    </x-dropdown.toggle>
                    <x-dropdown.body>
                        <x-modal.edit-order></x-modal.edit-order>
                        <x-dropdown.button wire:click="$dispatch('delete-order',{order_id:{{ $this->order->id }}})"
                            class="!text-red-500">{{ __('Delete') }}</x-dropdown.button>
                        <button></button>
                    </x-dropdown.body>
                </x-dropdown>
            @else
                <div>
                    <x-modal.edit-order></x-modal.edit-order>
                    <button type="button" wire:click="$dispatch('delete-order',{order_id:{{ $this->order->id }}})"
                        class="w-full p-2 mt-3 bg-red-500 rounded-full md:hidden s">{{ __('Delete') }}</button>
            @endif
        </td>
    </tr>
