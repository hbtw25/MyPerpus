@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between mt-14">
        <div class="flex flex-col items-center justify-between flex-1 md:flex-row gap-y-6 md:gap-x-0">
            <div>
                <p class="text-sm leading-5 text-midnight-blue dark:text-midnight-blue/30">
                    {!! __('Showing') !!}
                    @if ($paginator->firstItem())
                        <span class="font-bold">{{ $paginator->firstItem() }}</span>
                        {!! __('to') !!}
                        <span class="font-bold">{{ $paginator->lastItem() }}</span>
                    @else
                        {{ $paginator->count() }}
                    @endif
                    {!! __('of') !!}
                    <span class="font-bold">{{ $paginator->total() }}</span>
                    {!! __('results') !!}
                </p>
            </div>

            <div>
                <ul class="flex items-center h-8 -space-x-px text-sm">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <li>
                            <a aria-label="{{ __('pagination.previous') }}"
                                class="flex items-center justify-center h-8 px-3 leading-tight text-gray-500 transition-all duration-300 bg-white border border-gray-300 ms-0 border-e-0 rounded-s-lg hover:bg-gray-100 hover:text-midnight-blue dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                <span class="sr-only">Previous</span>
                                <svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M5 1 1 5l4 4" />
                                </svg>
                            </a>
                        </li>
                    @else
                        <li>
                            <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                                aria-label="{{ __('pagination.previous') }}"
                                class="flex items-center justify-center h-8 px-3 leading-tight text-gray-500 transition-all duration-300 bg-white border border-gray-300 ms-0 border-e-0 rounded-s-lg hover:bg-gray-100 hover:text-midnight-blue dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                <span class="sr-only">Previous</span>
                                <svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M5 1 1 5l4 4" />
                                </svg>
                            </a>
                        </li>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <li>
                                <span aria-disabled="true" class="transition-all duration-300">
                                    <span
                                        class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium leading-5 transition-all duration-300 bg-white border border-gray-300 cursor-default text-midnight-blue dark:bg-gray-800 dark:border-gray-600">{{ $element }}</span>
                                </span>
                            </li>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li>
                                        <span aria-current="page"
                                            class="z-10 flex items-center justify-center h-8 px-3 leading-tight transition-all duration-300 border border-blue-300 text-dodger-blue bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">{{ $page }}</span>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{ $url }}"
                                            aria-label="{{ __('Go to page :page', ['page' => $page]) }}"
                                            class="flex items-center justify-center h-8 px-3 leading-tight text-gray-500 transition-all duration-300 bg-white border border-gray-300 hover:bg-gray-100 hover:text-midnight-blue dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">{{ $page }}</a>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <li>
                            <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                                aria-label="{{ __('pagination.next') }}"
                                class="flex items-center justify-center h-8 px-3 leading-tight text-gray-500 transition-all duration-300 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-midnight-blue dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                <span class="sr-only">Next</span>
                                <svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                            </a>
                        </li>
                    @else
                        <li>
                            <a
                                class="flex items-center justify-center h-8 px-3 leading-tight text-gray-500 transition-all duration-300 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-midnight-blue dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                <span class="sr-only">Next</span>
                                <svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4"></path>
                                </svg>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
@endif
