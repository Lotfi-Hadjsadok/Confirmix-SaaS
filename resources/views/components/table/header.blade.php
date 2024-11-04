<thead
    class="hidden text-sm text-black border-b md:table-header-group border-slate-200 bg-slate-100 dark:border-surface-alt dark:bg-surface-alt dark:text-white">
    <tr>
        <th scope="col" class="p-4">
            <label for="checkAll" class="flex items-center cursor-pointer text-slate-700 dark:text-slate-300 ">
                <div class="relative flex items-center">
                    <input type="checkbox" x-model="checkAll">

                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" stroke="currentColor"
                        fill="none" stroke-width="4"
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
        <th class="p-4">{{ __('Employee') }}</th>
        <th class="p-4">{{ __('Status') }}</th>
        <th class="p-4"></th>
    </tr>
</thead>
