@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between">
        <div class="flex items-center justify-between flex-1">
            <div>
                <p class="p-2 text-sm leading-5 rounded-md tbg-primary dark:bg-surface-alt text-slate-200">
                    <span class="font-medium">{{ $paginator->total() }}</span>
                    {!! __('orders') !!}
                </p>
            </div>

            <div>
                <span class="relative z-0 flex gap-5 rounded-md shadow-sm rtl:flex-row-reverse">
                    @if (!$paginator->onFirstPage())
                        <button rel="prev" wire:click="previousPage" wire:loading.attr="disabled"
                            class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium leading-5 text-gray-500 bg-white border border-gray-300 rounded-l-md focus:z-10 focus:outline-none dark:bg-gray-300 dark:text-gray-900 dark:border-gray-300"
                            aria-label="{{ __('pagination.previous') }}">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                            {{ __('Prev') }}
                        </button>
                    @endif

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <button wire:click="nextPage" rel="next" wire:loading.attr="disabled"
                            class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium leading-5 text-gray-500 bg-white border border-gray-300 rounded-r-md focus:z-10 focus:outline-none dark:bg-gray-300 dark:text-surface-alt dark:border-gray-300 "
                            aria-label="{{ __('pagination.next') }}">
                            {{ __('Next') }}
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    @endif
                </span>
            </div>
        </div>
    </nav>
@endif
